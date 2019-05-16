<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wawancara;

class WawancaraController extends Controller
{
    public function index()
    {
        $interview['wawancara'] = Wawancara::all();
        return view('interview.wawancara',$interview);
    }
    public function create()
    {
        return view('interview.wawancara');
    }
    public function store()
    {
        Wawancara::create([
            'nim_caslab' => request('nim_caslab'),
            'nama' => request('nama'),
            'keputusan' => request('keputusan'),
            'karakter' => request('karakter'),
            'microteaching' => request('microteaching'),
            'komunikasi' => request('komunikasi'),
            // 'jumlah' => request('jumlah')
        ]);
        return redirect()->back();
    }
}
