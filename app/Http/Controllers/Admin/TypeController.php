<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SupplyDefaultTypes;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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

        $types = Type::where('name', '!=', SupplyDefaultTypes::ADDONS->value)->get();

        return view('users.admin.Inventory.type.create', compact(['types']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $type = Type::create([
        'name' => $request->name
       ]);

       return back()->with(['message' => 'Supply Type Added Successfully']);
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

        $type = Type::find($id);

        return view('users.admin.Inventory.type.edit', compact(['type']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = Type::find($id);

        $type->update([
            'name' => $request->name
        ]);


        return back()->with(['message' => 'Type name updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
