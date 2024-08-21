<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Barang;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::where('user_id', auth()->user()->id)
             ->orderBy('created_at', 'desc')
             ->get();
        $totalHarga = $items->sum('total');
        $subitem = $items->sum('quantity');
        return view('keranjang', [
            "items" => $items,
            "totalkeranjang" => $totalHarga,
            "subitem" => $subitem
        ]);
    }
    public function store(Request $request)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('barang_id', $request->barang)->get();
        if($cart->count()){
            $validatedData["created_at"] = Carbon::now()->format('Y-m-d H:i:s');
            $cart[0]->update($validatedData);
            $nama = ucwords($cart[0]->barang->nama);
            return redirect('/cart')->with('success', "Produk $nama sudah ada di keranjang Anda.");
        }else{
            $validatedData["user_id"] = auth()->user()->id;
            $validatedData["barang_id"] = $request->barang;
            $validatedData["total"] = $request->total;
            $validatedData["quantity"] = $request->quantity;
            Cart::create($validatedData);
            $produk = Barang::where('id', $request->barang)->first();
            $nama = ucwords($produk->nama);
            return redirect('/cart')->with('success', "Produk $nama berhasil ditambahkan ke dalam keranjang Anda");
        }
    }

    public function destroy(Request $request)
    {
        $produk = Cart::where('id', $request->id)->first();
        $produk->destroy($request->id);
        $nama = ucwords($produk->barang->nama);
        session()->flash('success', "Produk $nama berhasil dihapus dari keranjang Anda");

        return redirect('/cart');
    }

    public function updateCart(Request $request)
    {
        $item = Cart::findOrFail($request->input('item_id'));
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        // Pastikan bahwa $quantity berada di antara minimum dan stok produk
        $quantity = max($item->barang->minim, min($quantity, $item->barang->stok));

        // Update kolom quantity dan total
        $item->update([
            'quantity' => $quantity,
            'total' => $price
        ]);

        return response()->json(['success' => true]);
    }

    public function nyoba(Request $request){
        dd($request->price);

    }
}
