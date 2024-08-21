<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\DetailRating;
use App\Models\Rating;

class BarangController extends Controller
{
    public function index(){
        return view('admin.produk.index', [
            "title" => "Dashboard | Produk",
            "produk" => Barang::where('status', 1)->paginate(10),
            "all" => Barang::where('status', 1)->get()
        ]);
    }

    public function indexcreate(){
        return view('admin.produk.createproduk', [
            "title" => "Dashboard | Tambah Produk",
            "kategori" => Kategori::where('status', 1)->get()
        ]);
    }

    public function store (Request $request){
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "kategori_id" => 'required',
            "deskripsi" => 'max:5000',
            "gambar" => 'image|file|max:10240',
            "minim" => 'required',
            "quantity" => 'required',
            "stok" => 'min:1',
            "berat" => "max:255"

        ]);
        $rupiah1 = str_replace('.', '', $request->harga);
        $rupiah2 = str_replace('Rp', '', $rupiah1);
        $rupiah3 = str_replace(',00', '', $rupiah2);
        $validatedData['harga'] = $rupiah3;

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('produk');
        }
        $validatedData['slug'] = Str::random(30);
        $validatedData['user_id'] = auth()->user()->id;
        Barang::create($validatedData);
        $produk = Barang::where('slug', $validatedData['slug'])->first();
        return back()->with('success', "Produk: $produk->nama berhasil ditambahkan");
    }

    public function show($slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        $rate = DetailRating::where('barang_id', $barang->id)->get();
        if($rate->count()){
            $skor = 0;
            foreach($rate as $ra){
                $skor =+ $ra->nilai;
            }
            $hasil = $skor/$rate->count();
            $fix = number_format($hasil, 1);
        }else{
            $fix = 0;
        }
        return view('detailproduk', [
            "produk" => $barang,
            "rate" => $rate,
            "fix" => $fix
        ]);
    }

    public function updatestok(Request $request){
        $barang = Barang::where('id', $request->id)->first();
        $validatedData["stok"] = $request->stok;
        $barang->update($validatedData);
        return back()->with('success', "Stok $barang->nama berhasil diubah");
    }

    public function update(Request $request){
        $barang = Barang::where('id', $request->id)->first();
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "deskripsi" => 'max:5000',
            "minim" => 'required',
            "quantity" => 'required',
            "stok" => 'min:1',
            "gambar" => 'image|file|max:10240',
        ]);
        $rupiah1 = str_replace('.', '', $request->harga);
        $rupiah2 = str_replace('Rp', '', $rupiah1);
        $rupiah3 = str_replace(',00', '', $rupiah2);
        $validatedData['harga'] = $rupiah3;
        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('produk');
        }
        $barang->update($validatedData);
        return back()->with('success', "Data produk $barang->nama berhasil diubah");
    }

    public function destroy(Request $request)
    {
        $barang = Barang::where('id', $request->id)->first();
        $validatedData["status"] = 2;
        $barang->update($validatedData);
        return back()->with('success', "Data produk $barang->nama berhasil dihapus");
    }
}
