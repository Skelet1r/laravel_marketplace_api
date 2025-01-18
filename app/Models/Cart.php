<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    public $timestamps = false;

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
        'user_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
