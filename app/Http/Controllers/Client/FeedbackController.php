<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
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

        $user = Auth::user();

        $profile = $user->profile;

        $cart = $user->cart->where('is_check_out', false)->first();

        return view('users.client.feedback.create', compact(['profile', 'cart']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $cart = Cart::find($request->cart_id);

        $products = $cart->products;
        collect($products)->map(function ($product) use ($request){
            $product->update([
                'rate' => $request->rate
            ]);
        });

        $user = Auth::user();

        $request->validate([
            'message' => 'required'
        ]);


        Feedback::create([
            'message' => $request->message,
            'user_id' => $user->id,
            'rate' => $request->rate,
            'is_display' => true
        ]);



        return back()->with(['message' => 'Feedback is Submitted']);

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
