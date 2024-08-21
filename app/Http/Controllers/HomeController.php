<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $produk = DB::table('barangs')->inRandomOrder()->limit(4)->get();
        return view('home', [
            "barang" => $produk
        ]);
    }
}
