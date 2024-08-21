<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Barang;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.kategori.index', [
            "title" => "Dashboard | Kategori",
            "kategori" => Kategori::paginate(10),
            "all" => Kategori::where('status', 1)->get()
        ]);
    }

    public function create()
    {
        return view('admin.kategori.create', [
            "title" => "Dashboard | Buat Kategori"
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            "nama" => "required|unique:kategoris",
            "slug" => "required|unique:kategoris"
        ]);
        $validatedData["user_id"] = auth()->user()->id;
        Kategori::create($validatedData);
        $new = Kategori::where('slug', $request->slug)->first();
        return back()->with('success', "Kategori program: $new->nama berhasil ditambahkan");
    }

    public function listprogram($slug){
        $kategori = Kategori::where('slug', $slug)->get();
        return view('admin.kategori.listprodukkategori', [
            "title" => "Dashboard | Program Kategori: ".$kategori[0]->nama,
            "kategori" => Kategori::where('slug', $slug)->get(),
            "produk" => Barang::where('kategori_id', $kategori[0]->id)->paginate(10)
        ]);
    }

    public function indexupdate($slug){
        $kategori = Kategori::where('slug', $slug)->get();
        return view('admin.kategori.updatekategori', [
            "title" => "Update Kategori | ".$kategori[0]->nama,
            "kategori" => Kategori::where('slug', $slug)->get()
        ]);
    }

    public function update(Request $request){
        $oldslug=request('oldslug');
        $id=$request->id;
        $rules = [
            "nama" => 'required|max:255'
        ];

        if($request->slug != $oldslug){
            $rules['slug'] = 'required|unique:kategoris';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        Kategori::where('id', $id)->update($validatedData);
        $new = Kategori::where('id', $id)->get();
        return redirect()->route('updatekategori', ['slug' => $new[0]->slug])->with('success', "Kategori program berhasil diupdate");
    }

    public function nonaktif(){
        $id=request('id');
        $kategori = Kategori::where('id', $id)->first();
        $validatedData['status'] = 2;
        $kategori->update($validatedData);
        return back()->with('success', "Kategori program: $kategori->nama berhasil dinonaktifkan");
    }

    public function aktif(){
        $id=request('id');
        $kategori = Kategori::where('id', $id)->first();
        $validatedData['status'] = 1;
        $kategori->update($validatedData);
        return back()->with('success', "Kategori program: $kategori->nama berhasil diaktifkan kembali");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
