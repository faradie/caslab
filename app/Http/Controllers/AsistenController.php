<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tes;
use App\Soaltes;
use App\Jawaban;
use App\User;
use App\Wawancara;
use App\Portofolio;
use App\NilaiTulis;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class AsistenController extends Controller
{
    public function perhitunganTopsis($id, Request $request){
        //DEFINE BOBOT
        $bobot = array(4,3,4,5,5,3,5);


        //AMBIL DATA DARI DATABASE
        $nilai_tests = DB::table('users')
        ->rightJoin('nilai_tulis', 'users.nim', '=', 'nilai_tulis.nim')
        ->leftJoin('portofolios','users.nim','=','portofolios.nim')
        ->leftJoin('pilgans','users.nim','=','pilgans.nim')
        ->leftJoin('wawancaras','users.nim','=','wawancaras.nim')
        ->select(DB::raw('(IFNULL(pilgans.hasil,0)
        + IFNULL(portofolios.nilai,0)
        + IFNULL(wawancaras.keputusan,0)
        + IFNULL(wawancaras.karakter,0)
        + IFNULL(wawancaras.microteaching,0)
        + IFNULL(wawancaras.komunikasi,0)
        + IFNULL(wawancaras.hardware,0)
       ) as total_sales'),'users.*','nilai_tulis.nim as nims','pilgans.hasil as pilihanGanda','portofolios.id as porto_id','portofolios.nilai as nilai_porto','wawancaras.*')
       ->groupBy('users.nim')
       ->where('nilai_tulis.idTest',$id)
        ->get();
        if (count($nilai_tests)!= 0) {
                 // dd($nilai_tests);
        for ($i=0; $i < count($nilai_tests) ; $i++) { 
            $nim[] = $nilai_tests[$i]->nim;
            $nama[] = $nilai_tests[$i]->name;
        }
        
        //PERHITUNGAN X^2
        foreach ($nilai_tests as $key => $value) {
            $entityX[] = array(
                "x1" => pow($value->pilihanGanda == null ? 0 : $value->pilihanGanda,2),
                "x2" => pow($value->nilai_porto == null ? 0 : $value->nilai_porto,2),
                "x3" => pow($value->hardware == null ? 0 : $value->hardware,2),
                "x4" => pow($value->karakter == null ? 0 : $value->karakter,2),
                "x5" => pow($value->microteaching == null ? 0 : $value->microteaching,2),
                "x6" => pow($value->keputusan == null ? 0 : $value->keputusan,2),
                "x7" => pow($value->komunikasi == null ? 0 : $value->komunikasi,2),
            );

        }

        // PERHITUNGAN R

        //declare sigx
        for ($i=1; $i <=count($bobot) ; $i++) { 
            ${"sigX$i"} =0;
        }

        foreach ($nilai_tests as $key => $value) {
            for ($i=1; $i <=count($bobot) ; $i++) { 
                ${"sigX$i"} = ${"sigX$i"} + $entityX[$key]["x$i"];
            }
        }

        foreach ($nilai_tests as $key => $value) {
            $entityR[] = array(
                "r1" => $value->pilihanGanda == null ? 0 : $value->pilihanGanda/sqrt($sigX1),
                "r2" => $value->nilai_porto == null ? 0 : $value->nilai_porto/sqrt($sigX2),
                "r3" => $value->hardware == null ? 0 : $value->hardware/sqrt($sigX3),
                "r4" => $value->karakter == null ? 0 : $value->karakter/sqrt($sigX4),
                "r5" => $value->microteaching == null ? 0 : $value->microteaching/sqrt($sigX5),
                "r6" => $value->keputusan == null ? 0 : $value->keputusan/sqrt($sigX6),
                "r7" => $value->komunikasi == null ? 0 : $value->komunikasi/sqrt($sigX7),
            );
        }

        //END PERHITUNGAN R


        //PERHITUNGAN Y
        foreach ($nilai_tests as $key => $value) {
            $entityY[] = array(
                "y1" => $bobot[0]*$entityR[$key]["r1"],
                "y2" => $bobot[1]*$entityR[$key]["r2"],
                "y3" => $bobot[2]*$entityR[$key]["r3"],
                "y4" => $bobot[3]*$entityR[$key]["r4"],
                "y5" => $bobot[4]*$entityR[$key]["r5"],
                "y6" => $bobot[5]*$entityR[$key]["r6"],
                "y7" => $bobot[6]*$entityR[$key]["r7"],
            );
        }

        foreach ($nilai_tests as $key => $value) {
            $y1_check[] = $entityY[$key]["y1"];
            $y2_check[] = $entityY[$key]["y2"];
            $y3_check[] = $entityY[$key]["y3"];
            $y4_check[] = $entityY[$key]["y4"];
            $y5_check[] = $entityY[$key]["y5"];
            $y6_check[] = $entityY[$key]["y6"];
            $y7_check[] = $entityY[$key]["y7"];
        }

        for ($i=1; $i <=count($bobot) ; $i++) { 
            ${"yp".$i} = max(${"y".$i."_check"});
            $yp_arr[]= ${"yp".$i};
            ${"ym".$i} = min(${"y".$i."_check"});
            $ym_arr[]=${"ym".$i};
        }

        foreach ($nilai_tests as $key => $value) {
            $hijau[] = array(
                "h1" => pow($yp_arr[0]-$entityY[$key]["y1"],2),
                "h2" => pow($yp_arr[1]-$entityY[$key]["y2"],2),
                "h3" => pow($yp_arr[2]-$entityY[$key]["y3"],2),
                "h4" => pow($yp_arr[3]-$entityY[$key]["y4"],2),
                "h5" => pow($yp_arr[4]-$entityY[$key]["y5"],2),
                "h6" => pow($yp_arr[5]-$entityY[$key]["y6"],2),
                "h7" => pow($yp_arr[6]-$entityY[$key]["y7"],2),
            );
        }

        foreach ($nilai_tests as $key => $value) {
            $kuning[] = array(
                "k1" => pow($entityY[$key]["y1"]-$ym_arr[0],2),
                "k2" => pow($entityY[$key]["y2"]-$ym_arr[1],2),
                "k3" => pow($entityY[$key]["y3"]-$ym_arr[2],2),
                "k4" => pow($entityY[$key]["y4"]-$ym_arr[3],2),
                "k5" => pow($entityY[$key]["y5"]-$ym_arr[4],2),
                "k6" => pow($entityY[$key]["y6"]-$ym_arr[5],2),
                "k7" => pow($entityY[$key]["y7"]-$ym_arr[6],2),
            );
        }
        
        
        //declare
        for ($i=1; $i <= count($nilai_tests) ; $i++) { 
            ${"sigjau$i"}=0;
            ${"signing$i"}=0;
        }

        for ($i=1; $i <= count($bobot) ; $i++) { 

            for($n=1;$n<=count($nilai_tests);$n++){
                ${"sigjau$n"} = ${"sigjau$n"} + $hijau[$n-1]["h$i"];

                ${"signing$n"} = ${"signing$n"} + $kuning[$n-1]["k$i"];
            }
           
        }


        
        for ($i=1; $i <=count($nilai_tests)  ; $i++) { 
            $jap[] = sqrt(${"sigjau$i"});
            $jam[] = sqrt(${"signing$i"});
        }
        
        foreach ($nilai_tests as $key => $value) {
            $hasil[] = $jap[$key]/($jap[$key]+$jam[$key]);
        }

        foreach ($nilai_tests as $key => $value) {
            $toSorts[]= ([
                "nim" => $nim[$key],
                "nama" => $nama[$key],
                "bobots" => $hasil[$key],
            ]);
               
        }
        
        
        // dd($toSorts);
        $toSorts = collect($toSorts)->sortBy('bobots')->reverse()->toArray();
        return view('pages.asisten.nilai.detailTopsis', compact('toSorts'));
        

        // echo $sigX1."<br>".$sigX2."<br>".$sigX3."<br>".$sigX4."<br>".$sigX5."<br>".$sigX6."<br>".$sigX7."<br>";

        }

        return redirect()->back()->with('result_gagal', 'Perhitungan tidak tersedia');

    }


    public function topsisOne(){
        $listujian = Tes::all();
        return view('pages.asisten.nilai.list_topsis', compact('listujian'));
    }

   
    public function nilai_porto_submit($id, Request $request){
        try {
            $test = Portofolio::find($id);
            $test->update([
                'nilai' => request('inputNilai'),
            ]);
            return redirect()->route('list_portofolio')->with('result_berhasil', 'Penilaian Berhasil');
        } catch (\Throwable $th) {
            return redirect()->route('penilaian_porto',$id)->with('result_gagal', 'Nilai Gagal');
        }
    }

    public function penilaian_porto($id, Request $request){
        $nilaiTest = Portofolio::find($id);
        return view('pages.portofolio.beriNilai', compact('nilaiTest'));
    }

    public function hapus_soal($idTest,$id, Request $request){
        try {
                $deleteTest = Soaltes::find($id);
               $deleteTest->delete();
               $Test = Tes::find($idTest);
                       $soaltest = Soaltes::all()->where('id_tes_fk',$idTest);
                       return view('pages.asisten.soal.listsoal',compact('Test','soaltest'))->with('result_berhasil', 'Berhasil Hapus Soal!');
            } catch (\Throwable $th) {
                $Test = Tes::find($idTestid);
                       $soaltest = Soaltes::all()->where('id_tes_fk',$idTest);
                       return view('pages.asisten.soal.listsoal',compact('Test','soaltest'))->with('result_gagal', 'Gagal Hapus Soal!');
            }
    }


    public function list_nilai_total(){
        $listujian = Tes::all();
        return view('pages.asisten.nilai.total', compact('listujian'));
    }

    public function list_nilai_ujian($id, Request $request){
        $nilai_tests = DB::table('users')
        ->leftJoin('nilai_tulis', 'users.nim', '=', 'nilai_tulis.nim')
        ->leftJoin('portofolios','users.nim','=','portofolios.nim')
        ->leftJoin('pilgans','users.nim','=','pilgans.nim')
        ->leftJoin('wawancaras','users.nim','=','wawancaras.nim')
        ->select(DB::raw('(IFNULL(pilgans.hasil,0)
        + IFNULL(portofolios.nilai,0)
        + IFNULL(wawancaras.keputusan,0)
        + IFNULL(wawancaras.karakter,0)
        + IFNULL(wawancaras.microteaching,0)
        + IFNULL(wawancaras.komunikasi,0)
        + IFNULL(wawancaras.hardware,0)
       ) as total_sales'),'users.*','nilai_tulis.nim as nims','pilgans.hasil as pilihanGanda','portofolios.id as porto_id','portofolios.nilai as nilai_porto','wawancaras.*')->groupBy('users.nim')
        ->where('nilai_tulis.idTest', $id)->orderBy('total_sales','desc')
        ->get();
        // dd($nilai_tests);
        $Test = Tes::find($id);
        return view('pages.asisten.nilai.rincianTotal', compact('Test','nilai_tests'));
    }

    public function list_ujian(){
        $listujian = Tes::all();
        return view('pages.asisten.listujian', compact('listujian'));
    }

    public function buat_ujian(){
        return view('pages.asisten.buatujian');
        // $uid = Uuid::generate();
        // Tes::create([
        //     'id' => $uid,
        //     'nama_caslab' => request('nama_caslab'),
        //     'tempat_lahir' => request('tempat_lahir'),
        //     'tgl_lahir' => request('tgl_lahir'),
        //     'alamat' => request('alamat'),
        //     'user_id' => request('user_id')
        // ]);
        // return redirect()->back();
    }

    public function buat_ujian_submit(){
        try {
            $request = request();
            $uid = Uuid::generate();
            
            Tes::create([
                'id' => $uid,
                'nama_tes' => request('inputNama'),
            ]);
                return redirect()->route('list_ujian')->with('result_berhasil', 'Buat Ujian Berhasil');
            } catch (\Throwable $th) {
                return redirect()->route('list_ujian')->with('result_gagal', 'Buat Ujian Gagal');
            }
    }

    public function action_ujian($id, Request $request){
        try {
           switch ($request->submitbutton) {
               case 'Hapus':
               $deleteTest = Tes::find($id);
               $deleteTest->delete();
               return redirect()->route('list_ujian')->with('result_berhasil', 'Hapus Berhasil');
                   break;
                   case 'Edit':
                    $editTest = Tes::find($id);
                       return view('pages.asisten.editujian',compact('editTest'));
                       break;
                       case 'Daftar Soal':
                       $Test = Tes::find($id);
                       $soaltest = Soaltes::all()->where('id_tes_fk',$id);
                       return view('pages.asisten.soal.listsoal',compact('Test','soaltest'));
                           break;
                           case 'Wawancara':
                           $Test = Tes::find($id);
                        //    $nilaiTulisLanjut = NilaiTulis::with('user')->get()->groupBy('nim');
                           $nilaiTulisLanjut = DB::table('nilai_tulis')
                            ->join('users', 'users.nim', '=', 'nilai_tulis.nim')
                            ->where('users.is_approved', '1')
                            ->get()->groupBy('nim');
                           return view('pages.asisten.wawancara.listpeserta',compact('Test','nilaiTulisLanjut'));
                               break;
           }
        } catch (\Throwable $th) {
            return redirect()->route('list_ujian')->with('result_gagal', 'Action Gagal');
        }
    }
    
    public function action_wawancara($idTest,$nim,Request $request){
        try {
            switch ($request->submitbutton) {
                case 'Penilaian':
                $caslab = User::find($nim);
                $Test = Tes::find($idTest);
                return view('pages.asisten.wawancara.inputKomponen',compact('Test','caslab'));
                    break;
                    case 'Edit':
                        $caslab = User::find($nim);
                        $Test = Tes::find($idTest);
                        return view('pages.asisten.wawancara.inputKomponen',compact('Test','caslab'));
                        break;
            }
        } catch (\Throwable $th) {
            return back()->with('result_gagal', 'Action Gagal!');
        }
    }

    public function submit_wawancara($idTest,$nim,Request $request){
        $Test = Tes::find($idTest);
        $nilaiTulisLanjut = NilaiTulis::with('user')->get()->groupBy('nim');
        $uid = Uuid::generate();
        Wawancara::create([
            'id' => $uid,
            'nim' => $nim,
            'idTest'=> $idTest,
            'keputusan'=> request('inputKeputusan'),
            'karakter'=>request('inputKarakter'),
            'microteaching'=>request('inputMicroteaching'),
            'komunikasi'=>request('inputKomunikasi'),
            'hardware'=>request('inputHardware'),
        ]);
        return view('pages.asisten.wawancara.listpeserta',compact('Test','nilaiTulisLanjut'))->with('result_berhasil', 'Berhasil Input wawancara!');
    }

    public function edit_ujian_submit($id, Request $request){
        try {
            $test = Tes::find($id);
            $test->update([
                'nama_tes' => request('inputNama'),
            ]);
            return redirect()->route('list_ujian')->with('result_berhasil', 'Edit Berhasil');
        } catch (\Throwable $th) {
            return redirect()->route('list_ujian')->with('result_gagal', 'Edit Gagal');
        }
    }

    public function buat_soal($id){
        $test = Tes::find($id);
        return view('pages.asisten.soal.buatsoal',compact('test'));
    }

    public function buat_soal_submit($id){
        try {
            $request = request();
            $uid = Uuid::generate();
            
            Soaltes::create([
                'id' => $uid,
                'pertanyaan' => request('inputPertanyaan'),
                'kunci_jwb' => request('jawaban_0'),
                'id_tes_fk' => $id,
            ]);
            
            for ($i=0; $i <4 ; $i++) { 
                $jwbID = Uuid::generate();
                Jawaban::create([
                    'id' => $jwbID,
                    'soaltes_id' => $uid,
                    'jawaban' => request('jawaban_'.$i),
                ]);
            }
            return back()->with('result_berhasil', 'Berhasil tambah soal!');
        } catch (\Throwable $th) {
            return back()->with('result_gagal', 'Gagal tambah soal!');
        }
    }
}
