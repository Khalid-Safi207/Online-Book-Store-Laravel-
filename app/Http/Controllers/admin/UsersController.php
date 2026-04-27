<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view("admin.users",["users"=>$users]);
    }
    public function destroy($user_id){
        User::findOrFail($user_id)->deleteOrFail();
        return redirect()->route("admin.users");
    }
}
