<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as Pdf;

class CustomerInventoryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $customer_name;
    protected $datas;

    public function __construct($customer_name,$datas)
    {
        $this->customer_name = $customer_name;
        $this->datas = $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $inventory_item = Pdf::loadView('pdf.item-inventory-report-new', ['data' => $this->datas->get()])->setPaper('a4', 'landscape');
        $pdf = $inventory_item->output();

        return 
        $this->subject('Inventory Item Report')
        ->from('berbenlogistics@noreply.com','Berben Logistic')
        ->attachData($pdf, 'item_inventory_report ('.DATE("m/d/Y",strtotime(now())).').pdf', ['mime' => 'application/pdf'])
        ->markdown('mail.customer-inventory-report')
        ->with(['customer_name'=>$this->customer_name]);
    }
}
