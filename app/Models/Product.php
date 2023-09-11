<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'sizes'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function field(){
        return $this->hasOne(ProductField::class);
    }
    public function image() {
        return $this->hasOne(ProductImage::class);
    }
    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
}
