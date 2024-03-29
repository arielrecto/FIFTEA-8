<?php

namespace App\Http\Controllers\Client;

use App\Enums\SupplyDefaultTypes;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supply;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $type = Type::where('name', SupplyDefaultTypes::ADDONS->value)->first();
        $supplies = $type->supplies()->get()->toJson();
        $product = Product::find($id);
        $sizes  = $product->sizes;

        return view('products.show', compact(['product', 'sizes', 'supplies']));
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
    public function filter(string $name = 'milktea' ) {

        if ($name == 'siomai') {
            $siomai = Product::where('type', $name)->get();
            return $siomai;
        }
        $products = Product::get();
    }
}
