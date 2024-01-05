<?php

namespace App\Actions\Admin\Supply;

use App\Models\Supply;
use App\Models\Type;
use Illuminate\Http\Request;

class StoreSupplyAction {

    public function handle (Request $request) {

        $supply = Supply::create([
            'name' => $request->name,
            'unit_value' => $request->unit_value,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'size' => $request->size
        ]);


        $type = Type::where('name', $request->type)->first();

        $supply->types()->attach($type->id, ['price' => $request->price]);

        return $supply;
    }

}
