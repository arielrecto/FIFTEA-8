<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Supply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

         if($filter !== null){
            $supplies = Supply::where('name', 'like', '%'.  $filter . '%')->orWhere('size' , 'like', '%' .  $filter . '%')->get();
         }



         return view('users.admin.Inventory.index', compact(['supplies']));
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


        $request->validate([
            'name' => 'required',
            'unit_value' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'type' => 'required',
            'expiration_date' => 'required'
        ]);
        $supply = $storeSupplyAction->handle($request);


        return back()->with(['message' => 'supply added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supply = Supply::find($id);

        return view('users.admin.Inventory.show', compact(['supply']));
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

        $supply = $updateSupplyAction->handle($request, $id);

        return back()->with(['message' => 'Supply Data is Updated!']);

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
    public function filter(Request $request){

        $search = $request->search;

        $getAll = $request->getAll;

        $supplies = Supply::where('size', $request->size)->orWhereHas('types', function($q) use ($request){
            $q->where('name', $request->type);
        })->get();


        if($search !== null){
            $supplies = supply::where('size', $search)->orWhereHas('types', function($q) use ($search){
                $q->where('name', $search);
            })->orWhere('name', 'like', '%'.  $search . '%')->get();
        }

        if ($getAll !== null){
            $supplies = Supply::get();
        }




       return response(['supplies' => $supplies], 200);
    }
}
