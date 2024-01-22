<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GcashPayment;
use Illuminate\Http\Request;

class GcashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gcash = GcashPayment::latest()->first();

        if($gcash === null){
            return to_route('admin.gcash.create');
        }

        return to_route('admin.gcash.show', ['gcash' => $gcash->id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gcash = GcashPayment::latest()->first();

        return view('users.admin.Gcash.create', compact(['gcash']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate(['image' => 'required|mimes:png, jpg, jpeg']);

        $filename = 'gcash' . uniqid() . '.' . $request->image->extension();


        GcashPayment::create([
            'image' => $filename
        ]);

        $request->image->storeAs('public/gcash/' . $filename);

        return back()->with('success', 'Uploaded Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gcash = GcashPayment::find($id);

        return view('users.admin.Gcash.show', compact(['gcash']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $gcash = GcashPayment::find($id);

        return view('users.admin.Gcash.edit', compact(['gcash']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $filename = 'gcash' . uniqid() . '.' . $request->image->extension();


        $gcash = GcashPayment::find($id);

        $gcash->update([
            'image' => $filename
        ]);

        $request->image->storeAs('public/gcash/' . $filename);


        return to_route('admin.gcash.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
