<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clothe extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'color',
        'gender',
        'quantity_in_stock',
        'category_id',
        'brand_id',
        'user_id',
        'photo'
    ];

    public function cart() {
        return $this->hasMany(Cart::class);
    }
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function favorite() {
        return $this->hasMany(Favorite::class);
    }
}
