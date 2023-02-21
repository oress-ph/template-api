<?php
namespace App\Http\BusinessLogics;
use App\Models\InventoryPalletTransaction;
use Exception;
use Illuminate\Http\Response;

class InverntoryPalletTransactionBusinessLogic {

    public function post_inventory_pallet_transaction($inventory_pallet_transaction){
        try{
            $new_inventory_pallet = InventoryPalletTransaction::create($inventory_pallet_transaction);
            return [200, $new_inventory_pallet];
        }catch(Exception $e){
            return [$e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR];
        }
    }
}