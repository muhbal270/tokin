<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image',
        'title',
        'slug', // slug merupakan versi URL dari judul produk
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = Str::slug($product->title); // membuat slug dari judul produk saat membuat produk baru
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->title); // memperbarui slug saat mengupdate produk
        });
    }

    public function topupOptions()
    {
        return $this->hasMany(Topup::class);
    }
}
