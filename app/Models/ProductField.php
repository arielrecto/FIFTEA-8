<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductField extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'flavor',
        'sugar_level',
        'product_id',
        'category_id'
    ];

    public function product () {
        return $this->belongsTo(Product::class);
    }
    public function supply () {
        return $this->hasOne(Supply::class);
    }
}
