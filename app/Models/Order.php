<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Database\Seeders\OrderSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_ref',
        'user_id',
        'cart_id',
        'type',
        'status',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function payment () {
        return $this->hasOne(Payment::class);
    }
    public static function pending () {
        $pending  = Order::where('status', OrderStatus::PENDING->value)->get();

        return $pending;
    }
    public static function userTotalSpent(User $user){
        $total = Order::where('user_id', $user->id)->whereStatus(OrderStatus::DONE->value)->sum('total');

        return $total;
    }
}
