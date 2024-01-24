<?php

namespace App\Actions\Admin\Supply;

use App\Models\Supply;
use App\Models\SupplyHistory;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreSupplyAction {

    public function handle (Request $request) {

        $user = Auth::user();

        $supply = Supply::create([
            'name' => $request->name,
            'unit_value' => $request->unit_value,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'expiration_date' => $request->expiration_date,
            'low' => $request->low,
            'high' => $request->high
        ]);


        SupplyHistory::create([
            'adjusted_by' => $user->name,
            'adjustment_quantity' => $supply->quantity,
            'expiration_date' => $request->expiration_date,
            'quantity' => $request->quantity,
            'supply_id' => $supply->id
        ]);


        $type = Type::where('name', $request->type)->first();

        $supply->types()->attach($type->id, ['price' => $request->price]);

        return $supply;
    }

}
