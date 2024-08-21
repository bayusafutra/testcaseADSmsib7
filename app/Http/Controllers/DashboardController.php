<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $audit = Pesanan::where('status', 3)->get();
        $dikemas = Pesanan::where('status', 4)->get();
        $kirim = Pesanan::where('status', 5)->get();
        $ambil = Pesanan::where('status', 6)->get();
        $batal = Pesanan::where('status', 8)->get();
        $selesai = Pesanan::where('status', 7)->get();
        return view('admin.index', [
            "title" => "Administrator",
            "audit" => $audit,
            "dikemas" => $dikemas,
            "kirim" => $kirim,
            "ambil" => $ambil,
            "batal" => $batal,
            "selesai" => $selesai
        ]);
    }

    public function audit(){
        $audit = Pesanan::where('status', 3)->get();
        return view('admin.pesanan.audit', [
            "all" => $audit,
            "audit" => Pesanan::where('status', 3)->paginate(10),
            "title" => "Dashboard | Audit Pembayaran"
        ]);
    }

    public function dikemas(){
        $audit = Pesanan::where('status', 4)->get();
        return view('admin.pesanan.dikemas', [
            "all" => $audit,
            "dikemas" => Pesanan::where('status', 4)->paginate(10),
            "title" => "Dashboard | Pengemasan Pesanan"
        ]);
    }

    public function dikemaspost(Request $request){
        $pesanan = Pesanan::where('id', $request->dikemas)->first();
        $validatedData["status"] = 6;
        $pesanan->update($validatedData);

        return back()->with('success', "Pesanan menunggu pengambilan dari pelanggan");
    }

    public function jaskir(Request $request){
        $pesanan = Pesanan::where('id', $request->idjaskir)->first();
        $validatedData["jaskir"] = $request->jaskir;
        $validatedData["noresi"] = $request->noresi;
        $validatedData["timekirim"] = now();
        $validatedData["status"] = 5;
        $pesanan->update($validatedData);

        return back()->with('success', "Data pengiriman pesanan berhasil ditambahkan");
    }

    public function dikirim(){
        $pesanan = Pesanan::where('status', 5)->get();
        return view('admin.pesanan.dikirim', [
            "title" => "Dashboard | Pengiriman Pesanan",
            "all" => $pesanan,
            "dikirim" => Pesanan::where('status', 5)->paginate(10)
        ]);
    }

    public function diambil(){
        $pesanan = Pesanan::where('status', 6)->get();
        return view('admin.pesanan.diambil', [
            "title" => "Dashboard | Menunggu Pengambilan",
            "diambil" => Pesanan::where('status', 6)->paginate(10),
            "all" => $pesanan
        ]);
    }

    public function batal(){
        $pesanan = Pesanan::where('status', 8)->get();
        return view('admin.pesanan.batal', [
            "title" => "Dashboard | Pesanan Batal",
            "all" => $pesanan,
            "batal" => Pesanan::where('status', 8)->paginate(10)
        ]);
    }

    public function selesai(){
        $pesanan = Pesanan::where('status', 7)->get();
        return view('admin.pesanan.selesai', [
            "selesai" => Pesanan::where('status', 7)->paginate(10),
            "all" => $pesanan,
            "title" => "Dashboard | Pesanan Selesai"
        ]);
    }

    public function pesanan(){
        $pesanan = Pesanan::all();
        return view('admin.transaksi.pesanan', [
            "all" => $pesanan,
            "pesanan" => Pesanan::paginate(10),
            "title" => "Dashboard | Transaksi Pesanan"
        ]);
    }

    public function pembayaran(){
        $pembayaran = Pembayaran::all();
        return view('admin.transaksi.pembayaran', [
            "all" => $pembayaran,
            "pembayaran" => Pembayaran::paginate(10),
            "title" => "Dashboard | Transaksi Pembayaran"
        ]);
    }
}
