<?php

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->foreignIdFor(Cart::class);
            $table->foreignIdFor(Product::class);
            $table->string('size');
            $table->string('cart_product_no');
            $table->string('sugar_level');
            $table->string('price');
            $table->string('quantity');
            $table->json('extras');
            $table->string('total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_product');
    }
};
