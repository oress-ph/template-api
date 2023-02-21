<?php

namespace App\Mail;

use App\Models\InventoryItemTransaction;
use App\Models\Warehouse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as Pdf;

class ItemInventoryReportAutoSendEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $datas;
    protected $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datas,$customer)
    {
        $this->datas = $datas;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $item_inventory_report = Pdf::loadView('pdf.item-inventory-report-auto-send', ['datas' => $this->datas,'customer' => $this->customer])->setPaper('a4', 'landscape');
        $pdf = $item_inventory_report->output();

        return
        $this
        ->subject('Item Inventory Report')
        ->from('berbenlogistics@noreply.com','Berben Logistic')
        ->attachData($pdf, 'item_inventory_report ('.DATE("m/d/Y",strtotime(now())).').pdf', ['mime' => 'application/pdf'])
        ->markdown('mail.item-inventory-report')
        ->with(['data'=>$this->customer]);
    }
}
