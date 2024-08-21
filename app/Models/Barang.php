<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Kategori;
use App\Models\User;
use App\Models\DetailPesananan;
use App\Models\DetailRating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cart(){
        return $this->hasOne(Cart::class, 'barang_id');
    }

    public function detail(){
        return $this->hasMany(DetailPesananan::class, 'barang_id');
    }

    public function rate(){
        return $this->hasMany(DetailRating::class, 'barang_id');
    }
}
