<?php

namespace App\Http\Controllers\Employee;

use App\Enums\SupplyDefaultTypes;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Support\Facades\Redis;

class PointOfSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $queryCategory = $request->query('category');

        $products = Product::get();

        $categories = Category::get();

        $type = Type::where('name', SupplyDefaultTypes::ADDONS->value)->first();

        $supplies = $type->supplies->toJson();
        

        if($queryCategory !== null){

            $category = Category::where('name', $queryCategory)->first();

            $products = $category->products()->get();
        }


        return view('users.employee.PointOfSale.index', compact(['products', 'categories', 'supplies']));
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
