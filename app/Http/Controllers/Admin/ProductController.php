<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Product\StoreProductAction;
use App\Enums\SupplyDefaultTypes;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Models\Supply;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\error;

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
        $supplies = Supply::whereHas('types', function($q){
            $q->where('name', '!=', SupplyDefaultTypes::ADDONS->value);
        })->with('types')->get()->toJson();
        return view('users.admin.product.create', compact(['categories', 'supplies']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreProductAction $storeProductAction)
    {

        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg',
            'category' => 'required'
        ]);
        if(count(json_decode($request->sizes)) === 0){
            return back()->withErrors(['sizes' => 'the sizes field is required']);
        }

        if(count(json_decode($request->ingredients)) === 0){
            return back()->withErrors(['ingredients' => 'the ingredients field is required']);
        }

        $storeProductAction->handle($request);


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
        $product = Product::find($id);

        $categories = Category::with('type')->get();


        return view('users.admin.product.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        if ($request->category !== null) {
            $category = Category::where('name', $request->category)->first();
        }


        if ($request->image !== null) {
            $filename = 'product' . uniqid() . '.' . $request->image->extension();
        }

        $product = Product::find($id);

        $product->update([
            'image' =>  $request->image !== null ?  'storage/product/image/' . $filename : $product->image,
            'name' =>  $request->name !== null ? $request->name : $product->name,
            'description' => $request->description !== "<p><br></p>"? $request->description : $product->description,
            'price' => $request->price !== null ? $request->price : $product->price,
            'sizes' => $request->sizes !== "[]" ? $request->sizes : $product->sizes
        ]);

        if ($request->category !== null) {
            $product->categories()->attach($category->id);
        }

        if ($request->image !== null) {
            $request->image->storeAs('public/product/image/' . $filename);
        }

        return back()->with(['message' => 'product updated']);
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
