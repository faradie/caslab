<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Caslab;

class CaslabController extends Controller
{
    public function index()
    {
        $caslab['data_caslab'] = Caslab::all();
        return view('caslab.index',$caslab);
    }
    public function create()
    {
        return view('caslab.index');
    }
    public function store()
    {
        Caslab::create([
            'nim' => request('nim'),
            'nama_caslab' => request('nama_caslab'),
            'tempat_lahir' => request('tempat_lahir'),
            'tgl_lahir' => request('tgl_lahir'),
            'alamat' => request('alamat'),
            'user_id' => request('user_id')
        ]);
        return redirect()->back();
    }
    public function show($nim)
    {
        $caslab = Caslab::find($nim);
        return view('caslab.delete', ['caslab' => $caslab]);
    }
    public function edit($nim)
    {
        $caslab = Caslab::find($nim);
        return view('caslab.edit', ['caslab' => $caslab]);
    }
    public function update($nim)
    {
        $request->validate([
            'nim' => ['required'],
            'nama_caslab' => ['required'],
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required'],
            'alamat' => ['required'],
            'user_id' => ['required', 'unique:data_caslab'],
            // 'nim' => request('nim'),
            // 'nama_caslab' => request('nama_caslab'),
            // 'tempat_lahir' => request('tempat_lahir'),
            // 'tgl_lahir' => request('tgl_lahir'),
            // 'alamat' => request('alamat'),
            // 'user_id' => request('user_id')
        ]);

        // try{
        //     $caslab = Student::find($id);
        //     $caslab->student_name = $request->input('student_name');
        //     $caslab->student_email = $request->input('student_email');
        //     $caslab->student_address = $request->input('student_address');
        //     if($student->save()){
        //         return redirect()->route('home')->with('success', 'Student Record Updated Successfullly!');
        //     }
        // }catch (\Illuminate\Database\QueryException $e) {
        //     return redirect()->route('home')->with('failed', 'Student Record Can\'t Update Successfullly!');
        // } catch (\Exception $e) {
        //     return redirect()->route('home')->with('failed', 'Student Record Can\'t Update Successfullly!');
        // }

        return redirect()->route('data_caslab')->with('failed', 'Data tidak berhasil diubah!');
    }
    public function destroy(Caslabs $caslab)
    {
        // $nim->delete();
        // return view('caslab.index')->route('data_caslab.index');
        try{
            $caslab = Caslab::find($nim);
            if($caslab->delete()){
                return redirect()->route('data_caslab')->with('success', 'Data berhasil dihapus!');
            }
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('data_caslab')->with('failed', 'Data tidak berhasil dihapus!');
        }catch (\Exception $e) {
            return redirect()->route('data_caslab')->with('failed', 'Data tidak berhasil dihapus!');
        }

        return redirect()->route('data_caslab')->with('failed', 'Data tidak berhasil dihapus!');
    }
}
