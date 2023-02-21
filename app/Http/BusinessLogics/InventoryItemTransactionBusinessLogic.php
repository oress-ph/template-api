<?php

namespace App\Http\BusinessLogics;

use App\Models\InventoryItemTransaction;
use Exception;
use Illuminate\Http\Response;

class InventoryItemTransactionBusinessLogic
{

    public function post_inventory_item_transaction($inventory_item_transaction)
    {
        try {
            $new_inventory_ite_transaction = InventoryItemTransaction::create($inventory_item_transaction);

            $inventoryItemBusinessLogic = new InventoryItemBusinessLogic();
            $inventoryItemBusinessLogic->record_transaction_count($new_inventory_ite_transaction->inventory_item_id);
           
            $update_inventory_item =  $inventoryItemBusinessLogic->compute_inventory_item($new_inventory_ite_transaction->inventory_item_id);
            if ($update_inventory_item[0] != 200) return response()->json(['message' => $update_inventory_item[0]], $update_inventory_item[1]);

            return [200, $new_inventory_ite_transaction];
        } catch (Exception $e) {
            return [$e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR];
        }
    }
}
