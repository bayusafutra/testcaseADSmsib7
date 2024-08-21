<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\DetailPesananan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\URL;

class AlamatController extends Controller
{
    public function index($slug){
        $pesanan = Pesanan::where('slug', $slug)->first();
        $produk = DetailPesananan::where('pesanan_id', $pesanan->id)->get();
        $subtotal = $pesanan->total;
        return view('alamat.index', [
            "pesanan" => $pesanan,
            "produk" => $produk,
            "subtotal" => $subtotal,
            "alamat" => Alamat::where('user_id', auth()->user()->id)->where('aktif', 1)->get()
        ]);
    }

    public function ubahalamat(Request $request){
        $pesanan = Pesanan::where('id', $request->pesanan)->first();
        $validatedData["alamat_id"] = $request->alamat;
        $pesanan->update($validatedData);
        return redirect("/checkout/$pesanan->slug");
    }

    public function create($slug){
        $pesanan = Pesanan::where('slug', $slug)->first();
        $produk = DetailPesananan::where('pesanan_id', $pesanan->id)->get();
        $subtotal = $pesanan->total;
        return view('alamat.tambahalamat', [
            "pesanan" => $pesanan,
            "produk" => $produk,
            "subtotal" => $subtotal
        ]);
    }

    public function store(Request $request){
        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "notelp" => 'required',
            "alamat" => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['detail'] =  $request->detail;
        if($alamat->count() == 0){
            $validatedData['status'] = 1;
        }
        $validatedData['slug'] = Str::random(40);
        $provinsi = DB::table('ec_provinces')->where('id', $request->provinsi)->first();
        $kota = DB::table('ec_cities')->where('id', $request->kota)->first();
        $kecamatan = DB::table('ec_districts')->where('id', $request->kecamatan)->first();
        $kelurahan = DB::table('ec_subdistricts')->where('id', $request->kelurahan)->first();
        $kodepos = DB::table('ec_postalcode')->where('id', $request->kodepos)->first();

        $validatedData['provinsi'] = $provinsi->name;
        $validatedData['kota'] = $kota->name;
        $validatedData['kecamatan'] = $kecamatan->name;
        $validatedData['kelurahan'] = $kelurahan->name;
        $validatedData['kodepos'] = $kodepos->name;

        $pesanan = Pesanan::where('id', $request->pesanan)->first();
        $newalamat = Alamat::create($validatedData);

        $update["alamat_id"] =  $newalamat->id;
        $pesanan->update($update);
        return redirect("/ubahAlamat/$pesanan->slug")->with('berhasil', "Alamat pengiriman berhasil ditambahkan");
    }

    public function provinsi(){
        $data = DB::table('ec_provinces')
        ->where('name', 'LIKE', '%' . request('q') . '%')
        ->paginate(35);
        return response()->json($data);
    }
    public function regency($id){
        $data = DB::table('ec_cities')
            ->where('province_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(200);
        return response()->json($data);
    }
    public function district($id){
        $data = DB::table('ec_districts')
            ->where('regency_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(200);
        return response()->json($data);
    }
    public function village($id){
        $data = DB::table('ec_subdistricts')
            ->where('district_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(200);
        return response()->json($data);
    }
    public function kodepos($id){
        $data = DB::table('ec_postalcode')
            ->where('subdis_id', $id)
            ->where('name', 'LIKE', '%' . request('q') . '%')
            ->paginate(100);
        return response()->json($data);
    }

    public function edit($slug){
        session(['previous_route' => url()->previous()]);
        $alamat = Alamat::where('slug', $slug)->first();
        $pesanan = Pesanan::where('alamat_id', $alamat->id)->where('status', 1)
        ->get();
        return view('alamat.editalamat', [
            "alamat" => $alamat,
            "pesanan" => $pesanan
        ]);
    }

    public function update(Request $request){
        $alamat = Alamat::where('id', $request->id)->first();
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "notelp" => 'required',
            "alamat" => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['detail'] =  $request->detail;
        if($request->utama == "on"){
            $validatedData['status'] = 1;
            $swap = Alamat::where('user_id', auth()->user()->id)->where('status', 1)->first();
            $test["status"] = 2;
            $swap->update($test);
        }
        $provinsi = DB::table('ec_provinces')->where('id', $request->provinsi)->first();
        $kota = DB::table('ec_cities')->where('id', $request->kota)->first();
        $kecamatan = DB::table('ec_districts')->where('id', $request->kecamatan)->first();
        $kelurahan = DB::table('ec_subdistricts')->where('id', $request->kelurahan)->first();
        $kodepos = DB::table('ec_postalcode')->where('id', $request->kodepos)->first();

        $validatedData['provinsi'] = $provinsi->name;
        $validatedData['kota'] = $kota->name;
        $validatedData['kecamatan'] = $kecamatan->name;
        $validatedData['kelurahan'] = $kelurahan->name;
        $validatedData['kodepos'] = $kodepos->name;

        $alamat->update($validatedData);
        return redirect(session('previous_route'))->with('success', "Alamat pengiriman berhasil diubah");
    }

    public function destroy(Request $request){
        $alamat = Alamat::where('id', $request->hapus)->first();
        $validatedData["aktif"] = 2;
        $alamat->update($validatedData);
        return redirect(session('previous_route'))->with('success', "Alamat pengiriman berhasil dihapus");
    }
}
