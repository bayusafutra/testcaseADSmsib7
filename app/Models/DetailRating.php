<?php

namespace App\Models;
use App\Models\Rating;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRating extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function rating(){
        return $this->belongsTo(Rating::class, 'rating_id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
