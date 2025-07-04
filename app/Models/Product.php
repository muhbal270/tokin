<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image',
        'title',
        'slug', // slug merupakan versi URL dari judul produk
    ];
}
