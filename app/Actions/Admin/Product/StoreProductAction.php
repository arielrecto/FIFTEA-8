<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreProductAction {

    public function handle(Request $request) {

        $product = Product::crate([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

    }
}
