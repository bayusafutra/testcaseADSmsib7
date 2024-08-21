<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            "title" => "Masuk"
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            "username" => 'required',
            "password" => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(auth()->user()->roleid !== 1){
                return redirect()->intended('/');
            }else{
                return redirect()->intended('/dashboard');
            }
        }
        return back()->with('loginError', 'Login Failed, Please try again!');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
