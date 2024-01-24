<?php



namespace App\Actions\Admin\Supply;

use App\Models\Supply;

class GetSupplyAction {

    public function handle () {

        $supplies = Supply::latest()->get();

        return $supplies;
    }
}
