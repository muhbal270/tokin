<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'jumlah',
        'price',
        'position'
    ];
}
