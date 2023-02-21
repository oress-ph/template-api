<?php

namespace App\Console\Commands;

use App\Jobs\SendMailJob;
use App\Mail\EndOfDayAutoSendEmail;
use App\Models\Customer;
use App\Models\CustomerMaterial;
use App\Models\InventoryItem;
use App\Models\Warehouse;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EndOfDayReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:end_of_day_report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto send end of day report to customer daily';

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
        $customers = Customer::with('customer_contacts')
        ->where('status','Active')
        ->get();

        foreach($customers as $customer){
            $datas = [];
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');

            $warehouses = Warehouse::with('inventory_items')
            ->whereHas('inventory_items',function($query) use ($customer){
                $query->where('customer_id', $customer->id);
            })
            ->get()
            ->sortBy('inventory_item_transaction.inventory_date');

            $warehouse_array = ['warehouse'=>[]];

            foreach($warehouses as $warehouse){

                $total_begin_qty=0;
                $total_begin_weight=0;
                $total_receipts_qty=0;
                $total_receipts_weight=0;
                $total_issues_qty=0;
                $total_issues_weight=0;
                $total_ending_qty=0;
                $total_ending_weight=0;

                $warehouse_array = ['warehouse'=>[$warehouse->warehouse],'data'=>[],'total_weight'=>[]];

                $customer_materials = CustomerMaterial::with('inventory_items','inventory_items.customer_material','inventory_items.inventory_item_transaction','inventory_items.inventory_item_transaction.partial_bin')
                ->where('customer_id', $customer->id)
                ->get();
                foreach($customer_materials as $customer_material){
                    // $start_inventory_date = $inventory_item->inventory_item_transaction->first()->toArray()['inventory_date'];
                    
                    $begin_qty=0;
                    $begin_weight=0;
                    $receipts_qty=0;
                    $receipts_weight=0;
                    $issues_qty=0;
                    $issues_weight=0;
                    $ending_qty=0;
                    $ending_weight=0;

                    foreach($customer_material->inventory_items as $inventory_item){
                        foreach($inventory_item->inventory_item_transaction as $inventory_item_transaction){
                            if($inventory_item_transaction->partial_bin!=null){
                                $issues_qty += $inventory_item_transaction->quantity;
                                $issues_weight += $inventory_item_transaction->weight;
                            }else{
                                $begin_qty += $inventory_item_transaction->quantity;
                                $begin_weight += $inventory_item_transaction->weight;
                            }
                            $receipts_qty += $inventory_item_transaction->quantity;
                            $receipts_weight += $inventory_item_transaction->weight;
                            $ending_qty= $receipts_qty - $issues_qty;
                            $ending_weight= $receipts_weight - $issues_weight;
                        }

                    }

                    $data = 
                    [
                        'material_code'=>$customer_material->toArray()['code'],
                        'material'=>$customer_material->toArray()['material'],
                        'begin_qty'=>$begin_qty,
                        'begin_weight'=>$begin_weight,
                        'receipts_qty'=>$receipts_qty,
                        'receipts_weight'=>$receipts_weight,
                        'issues_qty'=>$issues_qty,
                        'issues_weight'=>$issues_weight,
                        'ending_qty'=>$ending_qty,
                        'ending_weight'=>$ending_weight,
                    ];
                    array_push($warehouse_array['data'], $data);

                    $total_begin_qty +=$begin_qty; 
                    $total_begin_weight +=$begin_weight;
                    $total_receipts_qty +=$receipts_qty;
                    $total_receipts_weight +=$receipts_weight;
                    $total_issues_qty += $issues_qty;
                    $total_issues_weight +=$issues_weight;
                    $total_ending_qty += $ending_qty;
                    $total_ending_weight +=$ending_weight;
                    
                }

                // array_push($warehouse_array['total_weight'], $total_weights);
                $warehouse_array['total_weight'] =[
                    'total_begin_qty'=>$total_begin_qty,
                    'total_begin_weight'=> $total_begin_weight,
                    'total_receipts_qty'=>$total_receipts_qty,
                    'total_receipts_weight'=>$total_receipts_weight,
                    'total_issues_qty'=>$total_issues_qty,
                    'total_issues_weight'=>$total_issues_weight,
                    'total_ending_qty'=>$total_ending_qty,
                    'total_ending_weight'=>$total_ending_weight
                ];
                array_push($datas, $warehouse_array);
            }
            if($datas != null){
                foreach($customer->customer_contacts as $customer_contact){
                    dispatch(new SendMailJob($customer_contact['email'], new EndOfDayAutoSendEmail($datas,$customer->customer,$customer->address,$customer_contact->email,$start_date,$end_date)));
                }
            }
        }
    }
}
