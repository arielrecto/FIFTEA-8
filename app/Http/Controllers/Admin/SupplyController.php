<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Supply\GetSupplyAction;
use App\Actions\Admin\Supply\StoreSupplyAction;
use App\Actions\Admin\Supply\UpdateSupplyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Supply\StoreSupplyRequest;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetSupplyAction $getSupplyAction)
    {
         $supplies = $getSupplyAction->handle();

         return view('users.admin.Inventory.index', compact(['supplies']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.admin.Inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplyRequest $request, StoreSupplyAction $storeSupplyAction)
    {

        $request->validate([
            'name' => 'required',
            'unit_value' => 'required',
            'unit' => 'required',
            'quantity' => 'required'
        ]);
        $supply = $storeSupplyAction->handle($request);


        return back()->with(['message' => 'supply added successfully']);
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
    public function update(Request $request, string $id, UpdateSupplyAction $updateSupplyAction)
    {
        $supply = $updateSupplyAction->handle($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
