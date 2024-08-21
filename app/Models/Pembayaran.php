<?php

namespace App\Models;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

}
