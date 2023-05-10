<?php


namespace App\Actions\Admin\Supply;

use App\Models\Supply;
use Illuminate\Http\Request;

class UpdateSupplyAction {

    public function handle(Request $request, $id) {

        $supply = Supply::find($id);

        $supply->update([
            'name' => $request->name,
            'unit_value' => $request->unit_value,
            'unit' => $request->unit,
            'quantity' => $request->quantity
        ]);

        return $supply;
    }

}
