<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;


class OrderItem extends Model
{

    use HasFactory;

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
        'order_id'
    ];

    public function orders(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
}
