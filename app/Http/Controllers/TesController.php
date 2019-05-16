<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soaltes; 

class TesController extends Controller
{
    public function create()
    {
        return view('tes_tulis.tes');
    }
    public function store()
    {
        Soaltes::create([
            'pertanyaan' => request('pertanyaan'),
            'jawab_a' => request('jawab_a'),
            'jawab_b' => request('jawab_b'),
            'jawab_c' => request('jawab_c'),
            'jawab_d' => request('jawab_d'),
            'jawaban' => request('jawaban'),
            // 'nilai_id' => request('nilai_id')
        ]);
        return redirect()->back();
    }
    public function index(){
        $soaltes['tes'] = Soaltes::all();
        return view('tes_tulis.tes',$soaltes);
    }
}
