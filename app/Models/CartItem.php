<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'quantity',
        'image',
        'color',
        'rating',
        'size',
        'cart_id',
    ];

    public $timestamps = false;

    public function carts(): BelongsTo {
        return $this->belongsTo(Cart::class);
    }
}
