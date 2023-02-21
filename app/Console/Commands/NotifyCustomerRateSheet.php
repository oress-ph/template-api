<?php

namespace App\Console\Commands;

use App\Jobs\SendMailJob;
use App\Mail\RateSheetAutoSendEmail;
use App\Models\Customer;
use App\Models\RateSheet;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

use function GuzzleHttp\Promise\all;

class NotifyCustomerRateSheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:sheets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email notification to customers';

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
        $customers = Customer::with('customer_contacts','rate_sheets')
        ->whereHas('rate_sheets',function(Builder $query){
            $query->whereRaw("DATEDIFF(expiry_date,'" . Carbon::now() . "')  = 30");
            $query->orWhereRaw("DATEDIFF(expiry_date,'" . Carbon::now() . "')  = 60");
        })
        ->where('status','Active')
        ->get();
        foreach($customers as $customer){
            $rate_sheets = RateSheet::with('customer')->where('id', $customer->toArray()['id'])->get();
            $rate_sheet =  $rate_sheets[0];
            foreach($customer->customer_contacts->toArray() as $customer_contact){
                dispatch(new SendMailJob($customer_contact['email'], new RateSheetAutoSendEmail($rate_sheet)));
            }
        }
    }
}
