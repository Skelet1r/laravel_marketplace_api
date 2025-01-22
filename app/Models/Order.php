<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'total',
        'date',
        'orderStatus',
        'user_id',
        'cart_id'
    ];

    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function cart(): HasOne {
        return $this->hasOne(Cart::class);
    }
}
