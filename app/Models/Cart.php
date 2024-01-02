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

    public function products()
    {
        return $this->hasMany(CartProduct::class)->with(['product']);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
