<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminsController extends Controller {
    public function index() {
        $admins = User::whereHas("admin")->join("admins", "admins.user_id", "=", "users.id")->select('users.*', 'admins.created_at as admin_created_at')->get();
        return view( 'admin.admins', ["admins"=>$admins]);
    }

    public function create() {
        $users = User::whereDoesntHave( 'admin' )->get();
        return view( 'admin.admin.add', [ 'users'=>$users ] );
    }

    public function store( Request $request ) {
        $validate = $request->validate( [
            'user'=>'exists:users,email|required|email'
        ] );
        $user_id = User::where( 'email', $validate[ 'user' ] )->first( 'id' );
        Admin::create( [ 'user_id'=>$user_id->id ] );
        return redirect()->route( 'admin.admins' );

    }
    public function destroy($admin_id){
        Admin::where("user_id",$admin_id)->delete();
        return redirect()->route( 'admin.admins' );
    }
}
