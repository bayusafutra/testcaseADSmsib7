<?php

namespace App\Models;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Kategori extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barang(){
        return $this->hasMany(Barang::class, 'kategori_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
