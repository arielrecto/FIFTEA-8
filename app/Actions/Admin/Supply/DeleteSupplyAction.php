<?php


namespace App\Actions\Admin\Supply;

use App\Models\Supply;

class DeleteSupplyAction {

    public function handle($id){

        $supply = Supply::find($id);

        $supply->delete();


        return [
            'message' => 'Item Successfully Deleted'
        ];
    }

}
