<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseProductModel extends Model
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
        'size'
    ];

    public $timestamps = false;
}
