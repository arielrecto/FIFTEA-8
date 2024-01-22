<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function preview(Request $request)
    {

        $filter = $request->filter;

        $orders = Order::with(['transaction', 'cart' => function ($cart) {
            $cart->with(['products.product']);
        }])->whereStatus(OrderStatus::DONE->value)->get();
        $totalSum = $orders->sum('total');

        if ($filter !==  null) {

            if ($filter === 'range') {

                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $orders = Order::with(['transaction', 'cart' => function ($cart) {
                    $cart->with(['products.product']);
                }])
                    ->whereStatus(OrderStatus::DONE->value)
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->get();

                $totalSum = $orders->sum('total');

            }
        }

        return view('sales.preview', compact(['orders', 'totalSum']));
    }
}
