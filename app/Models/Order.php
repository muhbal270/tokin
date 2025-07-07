<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'topup_id',
        'bank_id',
        'game_user_id',
        'zone_id',
        'invoice',
        'payment_proof',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function topup()
    {
        return $this->belongsTo(Topup::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
