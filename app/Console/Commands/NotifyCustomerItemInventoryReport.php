<?php

namespace App\Console\Commands;

use App\Jobs\SendMailJob;
use App\Mail\ItemInventoryReportAutoSendEmail;
use App\Models\Customer;
use App\Models\InventoryItem;
use App\Models\InventoryItemTransaction;
use App\Models\Warehouse;
use Illuminate\Console\Command;
use Barryvdh\DomPDF\Facade as Pdf;

class NotifyCustomerItemInventoryReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:item_inventory_report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto send item inventory report to customer daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customers = Customer::with([
            'customer_contacts'
        ])
        ->where('status','Active')
        ->get();

        foreach($customers as $customer){
            $datas = [];

            $warehouses = Warehouse::with(
                'inventory_items',
                'inventory_items.warehouse_receiving',
                'inventory_items.warehouse_receiving.warehouse_receiving_pallets',
                'inventory_items.inventory_item_transaction',
                'inventory_items.inventory_item_transaction.pick_list','inventory_items.inventory_item_transaction.pick_list.pick_list_items',
                'inventory_items.inventory_pallet',
                'inventory_items.inventory_pallet.storage_type',
                'inventory_items.inventory_pallet.storage_room_bin',)
            ->whereHas('inventory_items',function($query) use ($customer){
                $query->where('customer_id', $customer->id);
            })
            ->get();

            $warehouse_array = ['warehouse'=>[],'data'=>[]];
            foreach($warehouses as $warehouse){
                $warehouse_array = ['warehouse'=>[$warehouse->warehouse],'data'=>[]];

                
                foreach($warehouse->inventory_items as $inventory_item){
                    $available_qty = 0;
                    $available_weight = 0;
                    $pick_list_qty = 0;
                    $pick_list_weight = 0;

                    foreach($inventory_item->inventory_item_transaction as $inventory_item_transaction){
                        $available_qty += $inventory_item_transaction->toArray()['quantity'];
                        $available_weight += $inventory_item_transaction->toArray()['weight'];
                        if($inventory_item_transaction->pick_list!=null){
                            foreach($inventory_item_transaction->pick_list->pick_list_items as $pick_list_item){
                                $pick_list_qty += $pick_list_item['quantity'];
                                $pick_list_weight += $pick_list_item['weight'];
                            }
                        }
                    }
                    
                    $available_qty -= $pick_list_qty;
                    $available_weight -= $pick_list_weight;

                    $data = 
                    [
                        'batch_number'=>$inventory_item->toArray()['batch_number'],
                        'expiry_date'=>DATE("m/d/Y",strtotime($inventory_item->toArray()['expiry_date'])),
                        'storage_type'=>$inventory_item->inventory_pallet->storage_type->toArray()['storage_type'],
                        'storage_bin_number'=>$inventory_item->inventory_pallet->storage_room_bin->toArray()['storage_bin_number'],
                        'pallet_number'=>$inventory_item->inventory_pallet->toArray()['pallet_number'],
                        'available_qty'=>$available_qty,
                        'available_weight'=>$available_weight,
                        'put_away_qty'=>$inventory_item->toArray()['quantity'],
                        'put_away_weight'=>$inventory_item->toArray()['weight'],
                        'pick_list_qty'=>$pick_list_qty,
                        'pick_list_weight'=>$pick_list_weight,
                        'total_qty'=>$inventory_item->inventory_pallet->toArray()['total_quantity'],
                        'total_weight'=>$inventory_item->inventory_pallet->toArray()['total_weight'],
                        'wr_date'=> DATE("m/d/Y",strtotime($inventory_item->warehouse_receiving->toArray()['wr_date']))
                    ];
                    array_push($warehouse_array['data'], $data);
                    
                }

                array_push($datas, $warehouse_array);

            }
            if($datas != null){
                foreach($customer->customer_contacts->toArray() as $customer_contact){
                    dispatch(new SendMailJob($customer_contact['email'], new ItemInventoryReportAutoSendEmail($datas,$customer->customer)));
                }
            }
        }
        
    }
}
