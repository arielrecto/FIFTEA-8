<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_check_out'
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('size', 'sugar_level', 'quantity', 'extras');
    }
    public function order(){
        return $this->hasOne(Order::class);
    }
}
