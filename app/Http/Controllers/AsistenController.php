<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tes;
use App\Soaltes;
use App\Jawaban;
use App\User;
use App\Wawancara;
use App\NilaiTulis;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class AsistenController extends Controller
{


    public function list_nilai_total(){
        $listujian = Tes::all();
        return view('pages.asisten.nilai.total', compact('listujian'));
    }

    public function list_nilai_ujian($id, Request $request){
        $nilai_tests = DB::table('users')
        ->leftJoin('nilai_tulis', 'users.nim', '=', 'nilai_tulis.nim')
        ->leftJoin('portofolios','users.nim','=','portofolios.nim')
        ->leftJoin('wawancaras','users.nim','=','wawancaras.nim')
        ->select('users.*','nilai_tulis.nim as nims','nilai_tulis.hasil as hasils','portofolios.id as porto_id','wawancaras.*')
        ->where('nilai_tulis.idTest', $id)
        ->get();
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
                    case 'Diskualifikasi':
                        $deletedUser = User::find($nim);
                        $deletedUser->update([
                            'is_approved' => '2',
                        ]);
                        $nilaiTulisLanjut = DB::table('nilai_tulis')
                            ->join('users', 'users.nim', '=', 'nilai_tulis.nim')
                            ->where('users.is_approved', '1')
                            ->get()->groupBy('nim');
                        $Test = Tes::find($idTest);
                        return view('pages.asisten.wawancara.listpeserta',compact('Test','nilaiTulisLanjut'))->with('result_berhasil', 'Berhasil Diskualifikasi!');
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
