<?php

namespace App\Exports;

use App\Models\TransferRequestItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use DB;

class TruckRequestItemsExport implements FromCollection, WithHeadings
{
    
    use Exportable;

    protected $id;

    function __construct($id) {
        $this->id = $id;
    }

    public function collection()
    {
        // return TransferRequestItem::all();
        $data = DB::table('transfer_request_items')
        ->join('transfer_requests', 'transfer_request_items.tr_id', '=', 'transfer_requests.id')
        ->join('customer_materials', 'transfer_request_items.customer_material_id', '=', 'customer_materials.id')
        ->select('transfer_request_items.batch_number', 'customer_materials.code', 'customer_materials.material', 
            'transfer_request_items.expiry_date', 'transfer_request_items.unit', 'transfer_request_items.quantity', 
            'transfer_request_items.weight', 'transfer_request_items.volume', 'transfer_request_items.remarks')
        ->where('tr_id', $this->id)
        ->whereNull('transfer_request_items.deleted_at')
        ->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'Batch Number',
            'Material Code',
            'Material',
            'Expiry',
            'Unit',
            'Quantity',
            'Weight',
            'Volume',
            'Remarks'
        ];
    }
}
