<?php

namespace App\Http\Controllers\Client;

use App\Enums\SupplyDefaultTypes;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\GcashPayment;
use App\Models\Supply;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart_product_id  = 'crtprdctid-' . uniqid();

        $user = Auth::user();
        $cart = Cart::where('is_check_out', false)->where('user_id', $user->id)->first();

        if ($cart === null) {
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
        }

        if (is_null($request->size)) {
            return back()->with('error', 'Please psecify the size');
        }

        CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'size' => $request->size,
            'sugar_level' => $request->sugar_level,
            'quantity' => $request->quantity,
            'extras' => $request->extras ?? json_encode([]),
            'total' => $request->total,
            'price' => $request->price,
            'cart_product_no' => $cart_product_id
        ]);

        return redirect()->route('products')->with(['success' => 'Product has been added to your Cart']);
    }
    public function index($id) {
        $user = Auth::user();
        $cart = Cart::where('id', $id)->with('products')->where('user_id', $user->id)->first();

        $total = 0;

        foreach($cart->products as $product){
            $total = $total + $product->total;
        }

        $gcash = GcashPayment::latest()->first();

        return view('cart.cart', compact(['cart', 'total', 'gcash']));
    }

    public function showProduct ($id) {
        $cart = Cart::where('is_check_out', false)->first();
        $c_product = CartProduct::find($id);


        $sizes = Product::where('name', $c_product->product->name)->first()->sizes;


        dd($sizes);

        $subTotal = 0;

        foreach($cart->products as $product) {
            $subTotal = $subTotal + $product->price;
        }
        $type = Type::where('name', SupplyDefaultTypes::ADDONS->value)->first();
        $supplies = $type->supplies()->get()->toJson();

        return view('cart.products.show', compact(['cart', 'subTotal', 'c_product', 'supplies']));
    }

    public function updateCartItem(Request $request, $itemId) {

        $extra = json_decode($request->extras);


        $c_product = CartProduct::find($itemId);





        $updated = $c_product->update([
                'size' => $request->size,
                'quantity' => $request->quantity,
                'total' => ($request->quantity + $extra->pivot->price) * $c_product->price
            ]);

        if ($updated) {
            return redirect()->back()->with(['success' => 'Cart Item has been updated']);
        } else {
            return redirect()->back()->with(['error' => 'Cart Item cannot been updated']);
        }

    }

    public function deleteCartItem($itemId) {
        $c_product = CartProduct::find($itemId);

        $deleted = $c_product->delete();

        if ($deleted) {
            return redirect()->back()->with(['success' => 'Cart Item has been deleted']);
        } else {
            return redirect()->back()->with(['error' => 'Cart Item cannot been deleted']);
        }
    }
}
