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


        $filename = 'product' . uniqid() . '.' . $request->image->extension();

        $dir = $request->image->storeAs('/product/image/' . $filename, 'public');

        $product = Product::create([
            'image' =>  asset('/storage/'  . $dir),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sizes'=> $request->sizes
        ]);


        $product->categories()->attach($category->id);



    }
}
