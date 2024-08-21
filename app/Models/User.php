<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\Alamat;
use App\Models\Pembayaran;
use App\Models\Rating;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];

    public function kategori(){
        return $this->hasMany(Kategori::class, 'user_id');
    }

    public function barang(){
        return $this->hasMany(Barang::class, 'user_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'user_id');
    }

    public function alamat(){
        return $this->hasMany(Alamat::class, 'user_id');
    }

    public function pembayaran(){
        return $this->hasMany(Pembayaran::class, 'user_id');
    }

    public function rating(){
        return $this->hasMany(Rating::class, 'user_id');
    }
}
