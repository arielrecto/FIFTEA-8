<?php

namespace App\Actions\Admin\Supply;

use App\Models\Supply;
use Illuminate\Http\Request;

class StoreSupplyAction {

    public function handle (Request $request) {

        $supply = Supply::create([
            'name' => $request->name,
            'unit_value' => $request->unit_value,
            'unit' => $request->unit,
            'quantity' => $request->quantity
        ]);

        return $supply;
    }

}
