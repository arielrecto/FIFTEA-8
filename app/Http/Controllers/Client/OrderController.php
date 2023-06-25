<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
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
        $randomNumber = random_int(100000, 999999);
        $num_ref = 'ORDR' .  $randomNumber;

        $user = Auth::user();

        $oder = Order::create([
            'num_ref' => $num_ref,
            'user_id' => $user->id,
            'cart_id' => $request->cart_id,
            'total' => $request->total,
            'type' => 'online',
        ]);

        $cart = Cart::find($request->cart_id);

        $cart->update(['is_check_out' => true]);


        return redirect(route('products'))->with(['message' => 'Order Success']);
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
