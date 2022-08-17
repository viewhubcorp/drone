<?php

namespace App\Console\Commands;

use App\Transaction;
use Illuminate\Console\Command;
use Pay\WayForPay\WFP;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $parse = 'string:2|print|treck:8|chest|dd|chest:1';
        $print = explode('|', $parse);
        $fin = [];
        foreach ($print as $pr){
            $fin[] = explode(':', $pr);
        }
        dd($fin);

        $pay = new \App\WayForPay\WFP('10.00', 'USD');
        $pay_url = $pay->create();
        $pay_id = $pay->getId();
        dd($pay, $pay_url, $pay_id);
        
        if(isset($pay['invoiceUrl'])){
            $transaction = new \App\Transaction();
            $transaction->pay_identity = $pay_id;
            $transaction->user_id = $this->session->id();
            $transaction->sum = $sum;
            $transaction->save();

            return $this->send([
                'pay_url' => $pay_url['invoiceUrl']
            ]);
        }else{
            return $this->err();
        }
    }
}
