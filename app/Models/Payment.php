<?php

namespace App\Models;
use App\Models\Pesanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'payment_id');
    }
}
