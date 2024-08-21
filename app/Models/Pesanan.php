<?php

namespace App\Models;

use App\Models\User;
use App\Models\Alamat;
use App\Models\Payment;
use App\Models\Rating;
use App\Models\DetailPesananan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail(){
        return $this->hasMany(DetailPesananan::class, 'pesanan_id');
    }

    public function alamat(){
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }

    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class, 'pesanan_id');
    }

    public function rating(){
        return $this->hasOne(Rating::class, 'pesanan_id');
    }

}
