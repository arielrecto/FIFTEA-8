<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('type', 'online')->where('status', 'pending')->with('cart.products')->with('payment.user')->get();

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
    public function show(string $id)
    {
        $order = Order::whereId($id)->with(['payment'])->first();

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
    public function approved($id) {
        $order = Order::find($id);
        $randomNumber = random_int(100000, 999999);
        $num_transaction = 'TRSCTN' . $randomNumber;
        $user = Auth::user();
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'transaction_ref' => $num_transaction,
            'order_id' => $order->id,
        ]);

        $order->update(['status' => 'processed']);
        return back()->with(['message' => 'Order Success']);
    }
}
