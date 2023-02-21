<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as Pdf;

class EndOfDayAutoSendEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $datas;
    protected $customer;
    protected $address;
    protected $email;
    protected $start_date;
    protected $end_date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datas,$customer,$address,$email,$start_date,$end_date)
    {
        $this->datas = $datas;
        $this->customer = $customer;
        $this->address = $address;
        $this->email = $email;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $item_inventory_report = Pdf::loadView('pdf.customer-item-movement-report', ['datas' => $this->datas,'email'=>$this->email ,'address' => $this->address,'customer' => $this->customer,'start_date'=>$this->start_date,'end_date'=>$this->end_date])->setPaper('a4', 'landscape');
        $pdf = $item_inventory_report->output();

        return
        $this
        ->subject('Customer Item Movement Report')
        ->from('berbenlogistics@noreply.com','Berben Logistic')
        ->attachData($pdf, 'customer_item_movement_report ('.DATE("m/d/Y",strtotime(now())).').pdf', ['mime' => 'application/pdf'])
        ->markdown('mail.customer-item-movement-report')
        ->with(['data'=>$this->customer]);
    }
}
