<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('katalog', [
            "kategori" => Kategori::where('status', 1)->get(),
            "produk" => Barang::where('status', 1)->where('nama', 'like', '%' .request('search') .  '%')
            ->get()
        ]);
    }
}
