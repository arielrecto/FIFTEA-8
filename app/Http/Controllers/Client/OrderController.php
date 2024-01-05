<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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

        // dd($request->all());
        $request->validate([
            'image' => 'required',
            'qr_ref' => 'required',
            'amount' => 'required'
        ]);

        $randomNumber = random_int(100000, 999999);
        $num_ref = 'ORDR' .  $randomNumber;

        $user = Auth::user();

        $order = Order::create([
            'num_ref' => $num_ref,
            'user_id' => $user->id,
            'cart_id' => $request->cart_id,
            'total' => $request->total,
            'type' => 'online',
        ]);

        $filename = 'payment' . uniqid() . '.' . $request->image->extension();

        $cart = Cart::find($request->cart_id);

        Payment::create([
            'user_id' => $user->id,
            'order_id' => $order->id,
            'amount' => $request->amount,
            'payment_ref' => $request->qr_ref,
            'image' => asset('storage/payment/image/' . $filename)
        ]);

        $request->image->storeAs('public/payment/image/' . $filename);

        $cart->update(['is_check_out' => true]);


        return redirect(route('products'))->with(['message' => 'Order Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $user = Auth::user();

        $profile = $user->profile;

        $cart = $user->cart->where('is_check_out', false)->first();

        $order = Order::find($id);


       if(!$order->has('transaction')->exists()){

            return back()->with(['message' => 'Your Order is Pending the employee will processed!']);
       }



        return view('users.client.order.show', compact(['profile', 'order', 'cart']));
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
