<?php

namespace App\Http\Middleware;

use App\Models\Pembayaran;
use Closure;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class CheckStatusPesananBlmBayar
{
    public function handle($request, Closure $next)
    {
        // Mendapatkan slug dari URL
        $slug = $request->route('slug');

        // Mendapatkan data pesanan berdasarkan slug
        $pembayaran = Pembayaran::where('slug', $slug)->first();
        $pesanan = Pesanan::where('id', $pembayaran->pesanan->id)->first();
        // Memeriksa status pesanan
        if ($pesanan && $pesanan->status == 2) {
            if($pesanan && $pesanan->user_id == auth()->user()->id){
                return $next($request);
            }
        }
        return redirect('/pesanansaya');
    }
}
