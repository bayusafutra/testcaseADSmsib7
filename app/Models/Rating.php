<?php

namespace App\Models;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\DetailRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rate(){
        return $this->hasMany(DetailRating::class, 'rating_id');
    }

}
