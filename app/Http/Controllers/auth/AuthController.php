<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage() {
        return view( 'auth.login' );

    }

    public function registerPage() {
        return view( 'auth.register' );
    }

    public function register( Request $request, User $user ) {
        $validated = $request->validate( [
            'name' => 'required|min:5',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|email|unique:users'
        ] );
        $user->name = $validated[ 'name' ];
        $user->email = $validated[ 'email' ];
        $user->password = $validated[ 'password' ];
        $user->save();

        return redirect()->route( 'loginPage' )->with( 'success', 'تم إنشاء الحساب بنجاح الرجاء تسجيل الدخول' );

    }

    public function login( Request $request ) {
        $validated = $request->validate( [
            'email'=>'required|email',
            'password' => 'required',
        ] );
        if ( Auth::attempt( $validated ) ) {
            $request->session()->regenerate();
            return redirect()->route( 'client.index' )->with( 'user', Auth::user() );
        }
        return back()->withErrors( [ 'email' => 'Invalid credentials.' ] )->onlyInput( 'email' );
    }
}
