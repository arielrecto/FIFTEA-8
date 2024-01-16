<?php

namespace App\Http\Controllers\Client;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();
        $products = Product::withAvg('cart', 'rate')->get();

        $orderPending = Order::pending();

        $orders = Order::latest()->where('user_id', $user->id)->get();


        $spent = Order::userTotalSpent(Auth::user());

        $cart = Cart::where('is_check_out', false)->first();

        $profile = Auth::user()->profile;

        $confirmOrder = Order::where('status', OrderStatus::DONE->value)->count();

        return view('users.client.dashboard', compact(['products', 'orderPending', 'orders', 'spent', 'cart', 'profile', 'confirmOrder']));
    }
}
