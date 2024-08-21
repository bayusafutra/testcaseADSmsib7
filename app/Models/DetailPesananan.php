<?php

namespace App\Models;
use App\Models\Pesanan;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }

}
