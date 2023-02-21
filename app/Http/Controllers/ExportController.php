<?php

namespace App\Http\Controllers;

use App\Exports\TruckRequestItemsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function TransferRequestItems($id)
    {
        return Excel::download(new TruckRequestItemsExport($id), 'transfer_request_items.csv');
    }
}
