<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
        'sizes',
        'supplies'
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
    // public function image() {
    //     return $this->hasOne(ProductImage::class);
    // }
    public function cart(){
        return $this->hasMany(CartProduct::class);
    }
    public function rating(){
        return $this->hasMany(ProductFeedback::class);
    }
}
