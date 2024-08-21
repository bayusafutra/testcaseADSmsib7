<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\DetailRating;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.editprofile');
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        // dd($request->all());
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "notelp" => 'required|numeric',
            "gender" => 'required',
            "tgllahir" => 'required',
            "alamat" => 'required',
            "gambar" => 'image|file|max:10240'
        ]);

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('profil');
        }

        if ($request->username != auth()->user()->username) {
            $validatedData = $request->validate([
                "username" => 'unique:users'
            ]);
        }
        $user->update($validatedData);
        return back()->with('success', "Data diri pengguna berhasil diupdate");
    }

    public function hapuspp(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        Storage::delete($request->oldImage);
        $validatedData['gambar'] = null;
        $user->update($validatedData);

        return back()->with('success', "Foto profil berhasil dihapus");
    }

    public function pesanan()
    {
        $belumco = Pesanan::where('user_id', auth()->user()->id)->where('status', 1)->orderBy('updated_at', 'desc')->get();
        $belumbayar = Pesanan::where('user_id', auth()->user()->id)->where('status', 2)->orderBy('updated_at', 'desc')->get();
        $verifikasi = Pesanan::where('user_id', auth()->user()->id)->where('status', 3)->orderBy('updated_at', 'desc')->get();
        $dikemas = Pesanan::where('user_id', auth()->user()->id)->where('status', 4)->orderBy('updated_at', 'desc')->get();
        $dikirim = Pesanan::where('user_id', auth()->user()->id)->where('status', 5)->orderBy('updated_at', 'desc')->get();
        $ambil = Pesanan::where('user_id', auth()->user()->id)->where('status', 6)->orderBy('updated_at', 'desc')->get();
        $selesai = Pesanan::where('user_id', auth()->user()->id)->where('status', 7)->orderBy('updated_at', 'desc')->get();
        $batal = Pesanan::where('user_id', auth()->user()->id)->where('status', 8)->orderBy('updated_at', 'desc')->get();

        $pesanan = Pesanan::where('deadlinePaid', '<', Carbon::now())->get();
        if($pesanan){
            foreach ($pesanan as $pes) {
                $update["status"] = 8;
            $update["timebatal"] = now();
                $pes->update($update);

                $bayar = Pembayaran::where('id', $pes->pembayaran->id)->first();
                $hayo["status"] = 4;
                $bayar->update($hayo);
            }
        }
        return view('profile.pesanansaya', [
            "belumco" => $belumco,
            "belumbayar" => $belumbayar,
            "verifikasi" => $verifikasi,
            "dikemas" => $dikemas,
            "dikirim" => $dikirim,
            "ambil" => $ambil,
            "selesai" => $selesai,
            "batal" => $batal
        ]);
    }

    public function penilaian(){
        $aktif = Rating::where('user_id', auth()->user()->id)->where('status', 1)->get();
        $nonaktif = Rating::where('user_id', auth()->user()->id)->where('status', 2)->get();
        foreach($aktif as $ak){
            if(now() > $ak->pesanan->timebatasnilai){
                $update["status"] = 2;
                $ak->update($update);
            }
        }
        return view('profile.penilaiansaya', [
            "aktif" => $aktif,
            "nonaktif" => $nonaktif
        ]);
    }

    public function detail($slug){
        $supermen = Rating::where('slug', $slug)->first();
        $nomer = $supermen->pesanan->nomer;
        $batman = DetailRating::where('rating_id', $supermen->id)->where('status', 1)->get();
        if($batman->count() > 0){
            return view('profile.detailrating', [
                "hayo" => Rating::where('slug', $slug)->first()
            ]);
        }else{
            $update["status"] = 2;
            $supermen->update($update);
            return redirect('/penilaiansaya')->with('success', "Semua penilaian produk pada Pesanan #$nomer berhasil dilakukan");
        }
    }
}
