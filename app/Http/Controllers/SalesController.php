<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function preview() {
        $orders = Order::with(['transaction', 'cart' => function($cart){
            $cart->with(['products.product']);
        }])->whereStatus(OrderStatus::DONE->value)->get();
        $totalSum = $orders->sum('total');

        return view('sales.preview', compact(['orders', 'totalSum']));
    }
}
