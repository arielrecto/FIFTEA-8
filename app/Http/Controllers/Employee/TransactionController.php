<?php

namespace App\Http\Controllers\Employee;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
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


        $cart = Cart::create(['user_id' => $user->id]);

        $products = $request->products;

        // foreach($products as $product){
        //     $cart->products()->attach($product['id'],  [
        //         'size' => 'medium',
        //         'sugar_level' => '80%',
        //         'quantity' => 1,
        //         'extras' => 'extras'
        //     ]);
        // }
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
