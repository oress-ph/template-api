<?php

namespace App\Http\BusinessLogics;

use App\Http\Resources\InventoryItemResource;
use App\Http\Resources\InventoryPalletResource;
use App\Models\InventoryItem;
use App\Models\InventoryItemTransaction;
use App\Models\InventoryPallet;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class InventoryItemBusinessLogic
{

    public function post_inventory_item($new_inventory_item)
    {
        $inventory_item = InventoryItem::create($new_inventory_item);

        $inventory_item_transaction = [
            'warehouse_id' => $inventory_item->warehouse_id,
            'inventory_number' => null,
            'inventory_date' => date("Y-m-d"),
            'inventory_item_id' => $inventory_item->id,
            'inventory_pallet_id'  => $inventory_item->inventory_pallet_id,
            'manual_batch_number' => $inventory_item->manual_batch_number,
            'manufacturing_date' => $inventory_item->manufacturing_date,
            'expiry_date' => $inventory_item->expiry_date,
            'unit' => $inventory_item->unit,
            'quantity' => $inventory_item->quantity,
            'weight' => $inventory_item->weight,
            'volume' => $inventory_item->volume,
            'pa_quantity' => $inventory_item->pa_quantity,
            'pa_weight' => $inventory_item->pa_weight,
            'pa_volume' => $inventory_item->pa_volume,
            'pl_quantity' => $inventory_item->pl_quantity,
            'pl_weight' => $inventory_item->pl_weight,
            'pl_volume' => $inventory_item->pl_volume,
            'wr_id' => $inventory_item->wr_id,
            'pl_id' => null,
            'ia_id' => null,
            'pb_id' => null,
            'remarks' => '-',
        ];

        $inventoryItemTransactionBusinessLogic = new InventoryItemTransactionBusinessLogic();
        $post_inventory_item_transaction = $inventoryItemTransactionBusinessLogic->post_inventory_item_transaction($inventory_item_transaction);
        if ($post_inventory_item_transaction[0] != 200) return [$post_inventory_item_transaction[0], $post_inventory_item_transaction[1]];

        return [200, $inventory_item];
    }

    public function update_inventory_item_inventory_pallet($inventory_item_id, $new_inventory_pallet_id){
        $inventory_item = InventoryItem::findOrFail($inventory_item_id);
        $inventory_item->inventory_pallet_id = $new_inventory_pallet_id;
        $inventory_item->update();
    }

    public function compute_inventory_item($inventory_item_id)
    {
        $inventory_item_transactions = InventoryItemTransaction::where('inventory_item_id', $inventory_item_id)->get();

        $total_quantity = 0;
        $total_weight = 0;
        $total_volume = 0;
        $total_pa_quantity = 0;
        $total_pa_weight = 0;
        $total_pa_volume = 0;
        $total_pl_quantity = 0;
        $total_pl_weight = 0;
        $total_pl_volume = 0;

        foreach ($inventory_item_transactions as $inventory_item_transaction) {
            $total_quantity += $inventory_item_transaction->quantity;
            $total_weight += $inventory_item_transaction->weight;
            $total_volume += $inventory_item_transaction->volume;
            $total_pa_quantity += $inventory_item_transaction->pa_quantity;
            $total_pa_weight += $inventory_item_transaction->pa_weight;
            $total_pa_volume += $inventory_item_transaction->pa_volume;
            $total_pl_quantity += $inventory_item_transaction->pl_quantity;
            $total_pl_weight += $inventory_item_transaction->pl_weight;
            $total_pl_volume += $inventory_item_transaction->pl_volume;
        }

        $update_inventory_item = InventoryItem::findOrFail($inventory_item_id);
        $update_inventory_item->quantity = $total_quantity;
        $update_inventory_item->weight = $total_weight;
        $update_inventory_item->volume = $total_volume;
        $update_inventory_item->pa_quantity = $total_pa_quantity;
        $update_inventory_item->pa_weight = $total_pa_weight;
        $update_inventory_item->pa_volume = $total_pa_volume;
        $update_inventory_item->pl_quantity = $total_pl_quantity;
        $update_inventory_item->pl_weight = $total_pl_weight;
        $update_inventory_item->pl_volume = $total_pl_volume;
        $update_inventory_item->update();

        $inventoryPalletBusinessLogic = new InventoryPalletBusinessLogic();
        $update_inventory_pallet = $inventoryPalletBusinessLogic->compute_inventory_pallet($update_inventory_item->inventory_pallet_id);
        if ($update_inventory_pallet[0] != 200)  return [$update_inventory_pallet[0], $update_inventory_pallet[1]];

        return [200, $update_inventory_item];
    }

    public function record_transaction_count($inventory_item_id)
    {

        $inventory_item = InventoryItem::findOrFail($inventory_item_id);

        $transaction_count = $inventory_item->number_of_transaction + 1;
        $inventory_item->number_of_transaction = $transaction_count;

        $inventory_item->update();
    }
    public function get_inventory_items($id){
        
        $inventory_item = InventoryItem::select([
            'inventory_items.*',
            'cm.code',
            'cm.upc',
            'st.storage_type',
            DB::raw('inventory_items.quantity - IFNULL(sum(iit.quantity), 0) as total_quantity'),
        ])
        ->leftJoin('customer_materials as cm','cm.id','=','inventory_items.customer_material_id')
        ->leftJoin('inventory_pallets as ip','ip.id','=','inventory_items.inventory_pallet_id')
        ->leftJoin('storage_types as st','st.id','=','ip.storage_type_id')
        ->leftJoin('inventory_item_transactions as iit', function ($join) {
            $join->on('iit.inventory_item_id', '=', 'inventory_items.id')
            ->wherenotnull('iit.pb_id');
        })
        ->groupBy('inventory_items.id')
        ->OrderBy('inventory_items.id','DESC');

        $inventory_item_transaction = InventoryItemTransaction::select([
            'inventory_items.*',
            'cm.code',
            'cm.upc',
            'st.storage_type',
            DB::raw('inventory_items.quantity - IFNULL(sum(inventory_item_transactions.quantity), 0) as total_quantity'),
        ])
        ->leftJoin('inventory_items','inventory_items.id','=','inventory_item_transactions.inventory_item_id')
        ->leftJoin('customer_materials as cm','cm.id','=','inventory_items.customer_material_id')
        ->leftJoin('inventory_pallets as ip','ip.id','=','inventory_items.inventory_pallet_id')
        ->leftJoin('storage_types as st','st.id','=','ip.storage_type_id')
        ->wherenotnull('inventory_item_transactions.pb_id')
        ->groupBy('inventory_items.id');
        ;
        
        if($id){
            $inventory_item->where('ip.id',$id);
            $inventory_item_transaction->where('ip.id',$id);
        }

        $inventory_item->unionAll($inventory_item_transaction)->orderBy('batch_number');

        return new InventoryItemResource($inventory_item->paginate(10));
    }
}
