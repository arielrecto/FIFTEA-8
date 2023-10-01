<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\CartProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::factory(20)->create();

        $carts = Cart::get();
        $product = Product::first();

        $user =  User::role('customer')->first();

        foreach($carts as $cart){

            CartProduct::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'size' => 'large',
                'sugar_level' => '70%',
                'quantity' => '2',
                'extras' => '[]',
                'total' => 1000,
                'price' => 300,
                'cart_product_no' => "REF" . uniqid()
            ]);

            $order = Order::create([
                'cart_id' => $cart->id,
                'num_ref' => 'ORDR' . uniqid(),
                'user_id' => $user->id,
                'type' => 'online',
                'status' => 'pending',
                'total' => 1000
            ]);
            Payment::create([
                'user_id' => $user->id,
                'order_id' => $order->id,
                'amount' => 1000,
                'payment_ref' => 'QR' . uniqid(),
                'image' => fake()->imageUrl()
            ]);
        }
    }
}
