<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function new_user(){
        $users = User::all()->where('is_approved','0');
		return view('pages.newuser', compact('users'));
    }
}
