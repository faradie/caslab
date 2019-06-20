<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function new_user(){
        $users = User::all()->where('is_approved','0');
		return view('pages.newuser', compact('users'));
    }

    public function terima_caslab($id,Request $request){
        try {
            switch ($request->submitbutton) {
                case 'Tolak':
                $deletedUser = User::find($id);
                $deletedUser->delete();
                    break;
                case 'Terima':
                DB::table('users')
                ->where('nim', $id)
                ->update(['is_approved' => "1"]);
                $userRoles = User::find($id);
                $userRoles->assignRole('caslab');
                    break;
            }
            return redirect()->route('new_user')->with('result_berhasil', 'Penerimaan Berhasil');
        } catch (\Throwable $th) {
            return redirect()->route('new_user')->with('result_gagal', 'Penerimaan Gagal');
        }
    }

    public function user_list(){
        $users = User::all()->where('is_approved','1');
		return view('pages.listuser', compact('users'));
    }

    public function detail_user($id,Request $request){
        $this_user = User::find($id);
        $roles = \Spatie\Permission\Models\Role::all();
        $permissions = \Spatie\Permission\Models\Permission::all();
        $userRoles = $this_user->getRoleNames();
        return view('pages.detailuser', compact('this_user','roles','permissions','userRoles'));
    }
}
