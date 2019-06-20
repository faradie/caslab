<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tes;
use App\Soaltes;
use App\Jawaban;
use Webpatser\Uuid\Uuid;

class AsistenController extends Controller
{
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
           }
        } catch (\Throwable $th) {
            return redirect()->route('list_ujian')->with('result_gagal', 'Action Gagal');
        }
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
                'kunci_jwb' => request('jawaban_a'),
                'id_tes_fk' => $id,
            ]);
            
            Jawaban::create([
                'id_soal_fk' => $uid,
                'jawab_a' => request('jawaban_a'),
                'jawab_b' =>request('jawaban_b'),
                'jawab_c' =>request('jawaban_c'),
                'jawab_d' =>request('jawaban_d'),
            ]);
            return back()->with('result_berhasil', 'Berhasil tambah soal!');
        } catch (\Throwable $th) {
            return back()->with('result_gagal', 'Gagal tambah soal!');
        }
    }
}
