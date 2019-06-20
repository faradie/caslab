<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tes;
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
                       return view('pages.asisten.soal.listsoal',compact('Test'));
                           break;
               
               default:
                   # code...
                   break;
           }
        } catch (\Throwable $th) {
           
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
}
