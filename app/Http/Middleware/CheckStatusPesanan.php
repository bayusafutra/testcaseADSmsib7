<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class CheckStatusPesanan
{
    public function handle($request, Closure $next)
    {
        // Mendapatkan slug dari URL
        $slug = $request->route('slug');

        // Mendapatkan data pesanan berdasarkan slug
        $pesanan = Pesanan::where('slug', $slug)->first();
        // Memeriksa status pesanan
        if ($pesanan && $pesanan->status == 1) {
            if($pesanan && $pesanan->user_id == auth()->user()->id){
                return $next($request);
            }
        }
        return redirect('/pesanansaya');
    }
}
