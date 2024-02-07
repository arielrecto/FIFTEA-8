<?php

namespace App\Http\Controllers\Employee;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Supply;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $status = $request->query('status');

        $builder = Order::where('type', 'online')->where('status', 'pending');

        if ($status !== null) {

            $builder = Order::where('type', 'online')->where('status', $status);
        }


        $orders = $builder->with([
            'cart.products',
            'payment.user'
        ])->get();

        return view('users.employee.Orders.index', compact(['orders']));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {

        $status = $request->query('status');
        $message = $request->query('message');

        $order = Order::whereId($id)->with(['payment'])->first();

        if ($status !== null) {


            $order->update([
                'status' => $status
            ]);


            return back()->with(['message' => $message]);
        }


        return view('users.employee.Orders.show', compact(['order']));
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
        $order = Order::find($id);


        $order->update([
            'status' => 'reject'
        ]);


        return back()->with(['message' => 'order deleted']);
    }
    public function approved($id)
    {
        $order = Order::find($id);



        $products = collect($order->cart->products)->map(function ($cart_product) {
            $product = $cart_product->product;
            $quantity = $cart_product->quantity;
            $extras = $cart_product->extras;

            $c_extras = json_decode($extras);
            if (!empty($c_extras)){
                collect($c_extras)->map(function ($extra) {
                    $addon = Supply::find($extra->id);
                    $addon->update([
                        'quantity' => $addon->quantity - 1
                    ]);
                });
            }


            $supplies = collect(json_decode($product->supplies));
            $size = json_decode($cart_product->size)->name;

            $supplies->map(function ($supply) use ($size, $quantity) {
                if ($supply->size === $size) {
                    $productSupplies = $supply->supplies;

                    collect($productSupplies)->map(function ($p_supply) use ($quantity) {
                        $inventSupply = Supply::find($p_supply->id);

                        $inventSupply->update([
                            'quantity' => $inventSupply->quantity - ($p_supply->quantity * $quantity)
                        ]);
                    });
                }
            });





            // $ingredients = collect(json_decode($product->ingredients));

            // $ingredients->map(function($ingredient){
            //     $supply = Supply::where('name', $ingredient->name)->first();

            //     if($supply->quantity < $ingredient->quantity || $supply->quantity <= 0){
            //         return back()->with(['message' => "stock of {$supply->name} is not enough to process this order"]);
            //     }
            //     $supply->update([
            //         'quantity' => $supply->quantity - $ingredient->quantity
            //     ]);
            // });

        });

        $randomNumber = random_int(100000, 999999);
        $num_transaction = 'TRSCTN' . $randomNumber;
        $user = Auth::user();
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'transaction_ref' => $num_transaction,
            'order_id' => $order->id,
        ]);

        $order->update(['status' => OrderStatus::DONE->value]);
        return back()->with(['message' => 'Order Success']);
    }
}
