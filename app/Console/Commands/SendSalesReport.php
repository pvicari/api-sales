<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SalesReport;

class SendSalesReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendsalesreport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Report in the end of the day';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $vendas = DB::table('vendas')
        ->select(DB::raw('SUM(vendas.valor) as total'))
        ->whereDate('created_at', DB::raw('CURDATE()'))
        ->get();
        Mail::to('email@email.com')->send(new SalesReport($vendas));
    }
}
