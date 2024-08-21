<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup.index', [
            "title" => "Daftar"
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "email" => 'required|email|unique:users',
            "username" => 'min:5|max:255|unique:users',
            "password" => 'min:5|max:25|confirmed',
            "otp" => 'required|unique:users'

        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $admin = User::all();
        if($admin->count() == 0){
            $validatedData['roleid'] = 1;
        }
        $user = User::create($validatedData);
        // $user = User::where('email', $request->email)->first();
        Mail::send('email.verifikasiemail', ['otp' => $user->otp, 'user' => $user], function($message) use($request){
            $message->to($request->email);
            $message->subject('Verifikasi Email Srikandi Semanggi');
        });
        return redirect('/verifikasi')->with('success', "Silahkan verifikasi akun, Sistem telah mengirim kode otp ke email anda");
    }

    public function verifikasi(){
        return view('auth.verifikasi', [
            "title" => "Verifikasi Email"
        ]);
    }

    public function postverifikasi(Request $request){
        $user = User::where('otp', $request->otp)->first();
        if ($user) {
            if($request->otp == $user->otp){
                $rules = [
                    "otp" => 'required'
                ];

                $validatedData = $request->validate($rules);
                $validatedData['email_verified_at'] = date("Y-m-d H:i:s");
                User::where('id', $user->id)->update($validatedData);
                $erga['otp'] = null;;
                User::where('id', $user->id)->update($erga);
                return redirect('/login')->with('success', 'Akun anda telah terverifikasi, Silahkan masuk');
            }else{
                return back()->with('error', 'Kode otp salah, silahkan coba lagi!');
            }
        } else {
            return back()->with('error', 'Kode otp salah, silahkan coba lagi!');
        }
    }

    public function validasi(){
        return view('auth.validasi', [
            "title" => "Validasi Akun"
        ]);
    }

    public function validasipost(Request $request){
        // dd("erga cantik");
        $rules = [
            "username" => 'required|min:5|max:255|unique:users',
            "password" => 'required|min:5|max:25|confirmed'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', auth()->user()->id)->update($validatedData);
        return redirect('/');
    }
}
