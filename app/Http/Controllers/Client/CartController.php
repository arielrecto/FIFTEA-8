<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $cart = Cart::where('is_check_out', false)->first();
        $user = Auth::user();
        if ($cart === null) {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
        }
        $cart->products()->attach(
            $request->product_id,
            [
                'size' => $request->size,
                'sugar_level' => $request->sugar_level,
                'quantity' => $request->quantity,
                'extras' => $request->extras
            ]
        );
        return back()->with(['message' => 'Product added to your Cart']);
    }
    public function index($id) {
        $cart = Cart::where('id', $id)->with('products.image')->first();

        $total = 0;

        foreach($cart->products as $product){
            $total = $total + $product->price;
        }
        return view('cart.cart', compact(['cart', 'total']));
    }
}
