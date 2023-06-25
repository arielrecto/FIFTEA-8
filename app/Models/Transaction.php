<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'transaction_ref'
    ];

    public function order (){
        return $this->belongsTo(Order::class);
    }
    public function supplies (){
        return $this->belongsToMany(Supply::class);
    }
}
