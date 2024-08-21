<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Alamat;
use App\Models\Barang;
use App\Models\Cart;
use App\Models\DetailPesananan;
use App\Models\DetailRating;
use App\Models\Payment;
use App\Models\Pembayaran;
use App\Models\Rating;
use Illuminate\Support\Facades\Log;


class PesananController extends Controller
{
    public function index($slug)
    {
        $pesanan = Pesanan::where('slug', $slug)->first();
        $produk = DetailPesananan::where('pesanan_id', $pesanan->id)->get();
        $subtotal = $pesanan->total;
        $payment = Payment::where('status', 1)->get();
        return view('checkout', [
            "pesanan" => $pesanan,
            "produk" => $produk,
            "subtotal" => $subtotal,
            "payment" => $payment
        ]);
    }

    public function store(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = Str::random(40);
        $validatedData["total"] = $request->price;
        $alamat = Alamat::where('user_id', auth()->user()->id)->where('status', 1)->first();
        if ($alamat) {
            $validatedData["alamat_id"] = $alamat->id;
        }
        $pesanan = Pesanan::create($validatedData);

        $swap = strtoupper(Str::random(5));
        $hayo["nomer"] = "SS" . $swap . $pesanan->created_at->format('YmdHi') . $pesanan->id;
        $pesanan->update($hayo);

        $keranjang = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($keranjang as $ker) {
            $rules["barang_id"] = $ker->barang->id;
            $rules["pesanan_id"] = $pesanan->id;
            $rules["qtyitem"] = $ker->quantity;
            DetailPesananan::create($rules);
        }
        return redirect("/checkout/$pesanan->slug");
    }

    public function create(Request $request)
    {
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["slug"] = Str::random(40);
        $validatedData["total"] = $request->hayo;
        $alamat = Alamat::where('user_id', auth()->user()->id)->where('status', 1)->first();
        if ($alamat) {
            $validatedData["alamat_id"] = $alamat->id;
        }
        $pesanan = Pesanan::create($validatedData);

        $swap = strtoupper(Str::random(5));
        $hayo["nomer"] = "SS" . $swap . $pesanan->created_at->format('YmdHi') . $pesanan->id;
        $pesanan->update($hayo);

        $rules["barang_id"] = $request->barang;
        $rules["pesanan_id"] = $pesanan->id;
        $rules["qtyitem"] = $request->quantity;
        DetailPesananan::create($rules);

        return redirect("/checkout/$pesanan->slug");
    }

    public function checkout(Request $request)
    {
        $pesanan = Pesanan::where('id', $request->pesanan)->first();
        if ($request->pembayaran == 1) {
            $validatedData["alamat_id"] = null;
            $validatedData["subtotal"] = $pesanan->total;
        } else {
            $validatedData["subtotal"] = $pesanan->total + 7000;
        }

        if ($request->catatan) {
            $validatedData["catatan"] = $request->catatan;
        }
        $validatedData["deadlinePaid"] = now()->addDays(1);
        $validatedData["status"] = 2;
        $validatedData["payment_id"] = $request->payment;

        if ($request->pembayaran == 2 && $pesanan->alamat_id == null) {
            if ($request->payment) {
                $update["payment_id"] = $request->payment;
                $pesanan->update($update);
            }
            if ($request->catatan) {
                $update2["catatan"] = $request->catatan;
                $pesanan->update($update2);
            }
            return back()->with("alamat", "Pilih alamat pengiriman Anda terlebih dahulu");
        }

        $pesanan->update($validatedData);

        $create["pesanan_id"] = $pesanan->id;
        $create["user_id"] = auth()->user()->id;
        $create["slug"] = Str::random(40);

        $swap = strtoupper(Str::random(5));
        $create["nomer"] = "SSPAY" . $swap . $pesanan->deadlinePaid->format('YmdHi') . $pesanan->id;

        $bayar = Pembayaran::create($create);
        return redirect("/pembayaran/$bayar->slug");
    }

    public function batal(Request $request)
    {
        $bayar = Pembayaran::where('id', $request->bayar)->first();
        $update["status"] = 4;
        $bayar->update($update);

        $pesanan = Pesanan::where('id', $request->pesanan)->first();
        $capek["status"] = 8;
        $capek["deadlinePaid"] = null;
        $capek["pesanbatal"] = $request->batal;
        $capek["timebatal"] = now();
        $pesanan->update($capek);

        return redirect('/pesanansaya');
    }

    public function waktuhabis(Request $request)
    {
        $orderId = $request->input('orderId');
        $order = Pesanan::where('id', $orderId)->first();
        if ($order) {
            $update["status"] = 8;
            $update["timebatal"] = now();
            $order->update($update);

            $bayar = Pembayaran::where('id', $order->pembayaran->id)->first();
            $hayo["status"] = 4;
            $bayar->update($hayo);

            return response()->json(['message' => 'Status pesanan diperbarui']);
        } else {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }
    }

    public function terimapesanan(Request $request){
        $pesanan = Pesanan::where('id', $request->id)->first();
        $update["status"] = 7;
        $update["timeterima"] = now();
        $update["timebatasnilai"] = now()->addDays(7);
        $pesanan->update($update);

        $validatedData["slug"] = Str::random(40);
        $validatedData["pesanan_id"] = $pesanan->id;
        $validatedData["user_id"] = $pesanan->user->id;
        $rating = Rating::create($validatedData);

        foreach($pesanan->detail()->get() as $well){
            $tambah["rating_id"] = $rating->id;
            $tambah["barang_id"] = $well->barang->id;
            DetailRating::create($tambah);
        }

        return redirect("/detailpenilaian/$rating->slug");

    }

    ////////////////////////admin/////////////////

    public function audit(Request $request){
        $pesanan = Pesanan::where('id', $request->terima)->first();
        $update["status"] = 4;
        $update["timebataskirim"] = now()->addDays(3);
        $pesanan->update($update);

        $detail = DetailPesananan::where('pesanan_id', $pesanan->id)->get();
        foreach($detail as $det){
            $barang = Barang::where('id', $det->barang_id)->first();
            $hayolo["stok"] = $barang->stok - $det->qtyitem;
            $hayolo["terjual"] = $barang->terjual + $det->qtyitem;
            $barang->update($hayolo);
        }

        $pembayaran = Pembayaran::where('pesanan_id', $request->terima)->first();
        $update2["status"] = 3;
        $update2["tolakaudit"] = null;
        $pembayaran->update($update2);

        return back()->with('success', "Pembayaran pesanan berhasil diterima, Pesanan dialihkan ke menu Pesanan Dikemas");
    }

    public function tolakaudit(Request $request){
        $pesanan = Pesanan::where('id', $request->tolak)->first();
        $update["status"] = 2;
        $update["paidTime"] = null;
        $update["deadlinePaid"] = now()->addDays(1);
        $pesanan->update($update);

        $pembayaran = Pembayaran::where('pesanan_id', $request->tolak)->first();
        $update2["status"] = 5;
        $update2["tolakaudit"] = $request->pesantolak;
        $pembayaran->update($update2);

        return back()->with('success', "Pembayaran pesanan berhasil ditolak, kini menunggu pelanggan untuk melakukan proses Pembayaran kembali");
    }
}
