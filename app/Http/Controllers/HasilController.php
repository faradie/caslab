<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil_tes;
class HasilController extends Controller
{
    public function index(){
        $hasil_tes['hasil'] = Hasil_tes::all();
        return view('hasil_tes.hasil',$hasil_tes);
    }
}
