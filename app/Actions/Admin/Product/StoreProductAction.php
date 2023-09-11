<?php

namespace App\Actions\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Storage;

class StoreProductAction
{

    public function handle(Request $request)
    {

        $category = Category::where('name' , $request->category)->first();



        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sizes'=> $request->sizes
        ]);


        $product->categories()->attach($category->id);

        $filename = 'product' . uniqid() . '.' . $request->image->extension();


        $productImage = ProductImage::create([
            'name' => $filename,
            'url' => asset(
                'storage/product/image/' . $filename,
            ),
            'product_id' => $product->id
        ]);

        $request->image->storeAs('public/product/image/' . $filename);
    }
}
