<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;

class PortofolioController extends Controller
{
    public function edit(){
        return view('port.portofolio');
    }
    public function update(Request $request){ 
        $portofolio = $request->file('portofolio')->store('portofolios');
        $request->user()->update([
            'portofolio' => $portofolio
        ]);
        return redirect()->back();
    }
}
