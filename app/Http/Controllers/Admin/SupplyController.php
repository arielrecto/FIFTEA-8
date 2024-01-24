<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Supply;
use App\Models\StockLimit;
use Illuminate\Http\Request;
use App\Models\SupplyHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Supply\GetSupplyAction;
use App\Actions\Admin\Supply\StoreSupplyAction;
use App\Actions\Admin\Supply\UpdateSupplyAction;
use App\Http\Requests\Admin\Supply\StoreSupplyRequest;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetSupplyAction $getSupplyAction, Request $request)
    {
        $supplies = $getSupplyAction->handle();

        $filter = $request->filter;

        $limit = StockLimit::first();

        if ($filter !== null) {
            $supplies = Supply::where('name', 'like', '%' . $filter . '%')->orWhere('size', 'like', '%' . $filter . '%')->get();
        }

        return view('users.admin.Inventory.index', compact(['supplies', 'limit']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::get();
        return view('users.admin.Inventory.create', compact(['types']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreSupplyAction $storeSupplyAction)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'unit_value' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'type' => 'required',
            'expiration_date' => 'nullable',
            'low' => 'required',
            'high' => 'required'
        ]);

        $supply = $storeSupplyAction->handle($request);

        if (!$supply) {
            return back()->with(['error' => 'Supply was not added.']);
        }

        return back()->with(['success' => 'Supply added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supply = Supply::find($id);

        $first_stock = $supply->history()->first();

        $stocks = $supply->history()->where('id', '!=', $first_stock->id)->latest()->get();


        return view('users.admin.Inventory.show', compact(['supply', 'stocks', 'first_stock']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supply = Supply::find($id);

        $types = Type::get();

        return view('users.admin.Inventory.edit', compact(['supply', 'types']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, UpdateSupplyAction $updateSupplyAction)
    {
        // dd($request->all());

        $supply = $updateSupplyAction->handle($request, $id);

        if (!$supply) {
            return back()->with(['error' => 'Supply was not updated.']);
        }
        return back()->with(['success' => 'Supply Data is Updated!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supply = Supply::find($id);

        $supply->delete();


        return back()->with([
            'message' => 'supply Deleted'
        ]);
    }
    public function filter(Request $request)
    {

        $search = $request->search;

        $getAll = $request->getAll;

        $supplies = Supply::where('size', $request->size)->orWhereHas('types', function ($q) use ($request) {
            $q->where('name', $request->type);
        })->get();


        if ($search !== null) {
            $supplies = supply::where('size', $search)->orWhereHas('types', function ($q) use ($search) {
                $q->where('name', $search);
            })->orWhere('name', 'like', '%' . $search . '%')->get();
        }

        if ($getAll !== null) {
            $supplies = Supply::get();
        }




        return response(['supplies' => $supplies], 200);
    }
    public function addStock(Request $request, string $id)
    {


        $request->validate([
            'expiration_date' => 'required',
            'quantity' => 'required'
        ]);

        $supply = Supply::find($id);

        $user = Auth::user();

        SupplyHistory::create([
            'adjusted_by' => $user->name,
            'adjustment_quantity' => $supply->quantity,
            'expiration_date' => $request->expiration_date,
            'quantity' => $request->quantity,
            'supply_id' => $supply->id
        ]);

        $supply->update([
            'quantity' => $request->quantity + $supply->quantity,
        ]);

        return back()->with(['success' => 'Stock Added!']);
    }
}
