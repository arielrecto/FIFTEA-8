<?php

namespace App\Http\Controllers\Employee;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Supply;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $randomNumber = random_int(100000, 999999);
        $num_order = 'ORDER' . $randomNumber;
        $num_transaction = 'TRSCTN' . $randomNumber;
        $user = Auth::user();
        $cart_product_id  = 'crtprdctid-' . uniqid();

        $cart = Cart::create(['user_id' => $user->id]);

        $products = $request->products;

        foreach ($products as $product) {

            $productData = Product::find($product['id']);
            CartProduct::create([
                'product_id' => $productData->id,
                'size' => $product['size'],
                'cart_id' => $cart->id,
                'sugar_level' => $product['sugar_level'],
                'quantity' => $product['quantity'],
                'extras' => json_encode($product['addon']),
                'total' => $product['total'],
                'price' => $productData->price,
                'cart_product_no' => $cart_product_id
            ]);
          
        
            $ingredients = collect(json_decode($productData->ingredients));

            $ingredients->map(function ($ingredient) {
                $supply = Supply::where('name', $ingredient->name)->first();

                if ($supply->quantity < $ingredient->quantity || $supply->quantity <= 0) {
                    return back()->with(['message' => "stock of {$supply->name} is not enough to process this order"]);
                }
                $supply->update([
                    'quantity' => $supply->quantity - $ingredient->quantity
                ]);
            });
        }
        $order = Order::create([
            'num_ref' => $num_order,
            'user_id' => $user->id,
            'cart_id' => $cart->id,
            'type' => 'walk_in',
            'status' => 'processed',
            'total' => $request->total
        ]);

        $transaction = Transaction::create([
            'transaction_ref' => $num_transaction,
            'user_id' => $user->id,
            'order_id' => $order->id
        ]);


        $cart->update([
            'is_check_out' => true,
        ]);


        return response([
            'message' => 'Order Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
