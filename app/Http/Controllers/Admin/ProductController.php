<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Product\StoreProductAction;
use App\Http\Requests\Admin\Product\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('users.admin.product.list', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::get();
        return view('users.admin.product.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreProductAction $storeProductAction)
    {
        $product = $storeProductAction->handle($request);


        return back()->with(['message' => 'product Added Success']);
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
        $product = Product::find($id);


        $product->delete();


        return back()->with(['message' => 'Product Deleted!']);
    }
}
