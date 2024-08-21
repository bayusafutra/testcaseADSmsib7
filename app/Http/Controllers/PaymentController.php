<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payment.index', [
            "title" => "Dashboard | Metode Pembayaran",
            "payment" => Payment::paginate(10)
        ]);
    }

    public function create(){
        return view('admin.payment.createpayment', [
            "title" => "Dashboard | Tambah Metode Pembayaran"
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            "nama" => "required|max:255",
            "atasnama" => "required|max:255",
            "nomer" => "required|max:255",
            "gambar" => 'image|file|max:10240',
            "logo" => 'image|file|max:10240'
        ]);
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('barcode');
        }
        if($request->file('logo')){
            $validatedData['logo'] = $request->file('logo')->store('logopayment');
        }

        $validatedData['slug'] = Str::random(30);
        $new = Payment::create($validatedData);
        return back()->with('success', "Metode pembayaran: $new->nama berhasil ditambahkan");
    }

    public function edit($slug){
        return view('admin.payment.updatepayment', [
            "title" => "Dashboard | Update Metode Pembayaran",
            "payment" => Payment::where('slug', $slug)->first()
        ]);
    }

    public function update(Request $request){
        $payment = Payment::where('id', $request->id)->first();
        $validatedData = $request->validate([
            "nama" => "required|max:255",
            "atasnama" => "required|max:255",
            "nomer" => "required|max:255",
            "gambar" => 'image|file|max:10240',
            "logo" => 'image|file|max:10240'
        ]);

        if ($request->file('logo')) {
            if ($request->oldlogo) {
                Storage::delete($request->oldLogo);
            }
            $validatedData['logo'] = $request->file('logo')->store('logo');
        }

        if ($request->file('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('barcode');
        }
        $payment->update($validatedData);
        return back()->with('success', "Metode pembayaran: $payment->nama berhasil diupdate");
    }


    public function nonaktif(Request $request){
        $payment = Payment::where('id', $request->id)->first();
        $validatedData["status"] = 2;
        $payment->update($validatedData);
        return back()->with('success', "Metode pembayaran $payment->nama berhasil di Non-Aktifkan");
    }

    public function aktif(Request $request){
        $payment = Payment::where('id', $request->id)->first();
        $validatedData["status"] = 1;
        $payment->update($validatedData);
        return back()->with('success', "Metode pembayaran $payment->nama berhasil di aktifkan kembali");
    }
}
