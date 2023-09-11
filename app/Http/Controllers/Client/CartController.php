<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $cart_product_id  = 'crtprdctid-' . uniqid();

        $cart = Cart::where('is_check_out', false)->first();
        $user = Auth::user();
        if ($cart === null) {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
        }
        CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'size' => $request->size,
            'sugar_level' => $request->sugar_level,
            'quantity' => $request->quantity,
            'extras' => $request->input('extras'),
            'total' => $request->total,
            'price' => $request->price,
            'cart_product_no' => $cart_product_id
        ]);
        return back()->with(['message' => 'Product added to your Cart']);
    }
    public function index($id) {
        $cart = Cart::where('id', $id)->with('products')->first();

        $total = 0;

        foreach($cart->products as $product){
            $total = $total + $product->total;
        }
        return view('cart.cart', compact(['cart', 'total']));
    }
    public function showProduct ($id) {
        $cart = Cart::where('is_check_out', false)->first();
        $c_product = CartProduct::find($id);

        $subTotal = 0;

        foreach($cart->products as $product) {
            $subTotal = $subTotal + $product->price;
        }

        return view('cart.products.show', compact(['cart', 'subTotal', 'c_product']));
    }
}
