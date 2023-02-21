<?php

namespace App\Http\BusinessLogics;

use App\Models\InventoryItemTransaction;
use App\Models\InventoryPallet;
use Exception;
use Illuminate\Http\Response;

class InventoryPalletBusinessLogic
{

    public function post_inventory_pallet($inventory_pallet, $id, $module)
    {
        try {

            $new_inventory_pallet = InventoryPallet::create($inventory_pallet);

            $inventory_pallet_transaction = [
                'warehouse_id' => $new_inventory_pallet->warehouse_id,
                'inventory_number' => null,
                'inventory_date' => date("Y-m-d"),
                'inventory_pallet_id' => $new_inventory_pallet->id,
                'storage_room_bin_id' => $new_inventory_pallet->storage_room_bin_id,
                'wr_id' => $module == 'wr' ? $id : null,
                'pa_id' => $module == 'pa' ? $id : null,
                'bb_id' => $module == 'bb' ? $id : null,
                'pl_id' => $module == 'pl' ? $id : null,
                'remarks' => '-',
            ];

            $inventoryPalletTransactionBusinessLogic = new InverntoryPalletTransactionBusinessLogic();
            $postInventoryPalletTransaction = $inventoryPalletTransactionBusinessLogic->post_inventory_pallet_transaction($inventory_pallet_transaction);
            if ($postInventoryPalletTransaction[0] != 200) return [$postInventoryPalletTransaction[0], $postInventoryPalletTransaction[1]];

            return [200, $new_inventory_pallet];
        } catch (Exception $e) {
            return [$e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR];
        }
    }

    public function update_inventory_pallet_location($inventory_pallet_id, $storage_room_bin_id)
    {
        try {
            $update_inventory_pallet = InventoryPallet::findOrFail($inventory_pallet_id);
            $update_inventory_pallet->storage_room_bin_id = $storage_room_bin_id;
            $update_inventory_pallet->update();

            return [200, $update_inventory_pallet];
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update_inventory_pallet_status($inventory_pallet_id, $status)
    {
        try {
            $update_inventory_pallet = InventoryPallet::findOrFail($inventory_pallet_id);
            $update_inventory_pallet->status = $status;
            $update_inventory_pallet->update();

            return [200, $update_inventory_pallet];
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function compute_inventory_pallet($inventory_pallet_id)
    {
        try {
            $update_inventory_pallet = InventoryPallet::findOrFail($inventory_pallet_id);

            $source_total_quantity = 0;
            $source_total_weight = 0;
            $source_total_volume = 0;

            $item_inventory_transactions = InventoryItemTransaction::where('inventory_pallet_id', $update_inventory_pallet->id)->get();

            foreach ($item_inventory_transactions as $item_inventory_transaction) {
                $source_total_quantity += $item_inventory_transaction->quantity;
                $source_total_weight += $item_inventory_transaction->weight;
                $source_total_volume += $item_inventory_transaction->volume;
            }

            $update_inventory_pallet->total_quantity = $source_total_quantity;
            $update_inventory_pallet->total_weight = $source_total_weight;
            $update_inventory_pallet->total_volume = $source_total_volume;
            $update_inventory_pallet->update();

            return [200, $update_inventory_pallet];
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
