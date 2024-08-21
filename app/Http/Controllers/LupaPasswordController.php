<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LupaPasswordController extends Controller
{
    public function index()
    {
        return view('auth.indexLP', [
            "title" => "Lupa Password"
        ]);
    }

    public function lupapassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // $token = Str::random(210);
        $email = PasswordReset::where('email', $request->email)->get();
        if ($email->count()) {
            DB::table('password_resets')->update([
                'created_at' => Carbon::now()
            ]);
            $token = $email[0]->token;
        } else {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => Str::random(210),
                'created_at' => Carbon::now()
            ]);
            $swap = PasswordReset::where('email', $request->email)->first();
            $token = $swap->token;
        }
        $user = User::where('email', $request->email)->first();

        Mail::send('email.lupapassword', ['token' => $token, 'user' => $user], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Setel Ulang Kata Sandi');
        });

        return back()->with('message', 'Sistem berhasil mengirip pesan reset password ke email anda');
    }

    public function resetpassword($token)
    {
        $user = PasswordReset::where('token', $token)->first();
        return view('auth.indexRP', [
            "title" => "Reset Password",
            'token' => $token,
            "email" => $user
        ]);
    }

    public function resetpass(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Password anda sudah terganti');
    }
}
