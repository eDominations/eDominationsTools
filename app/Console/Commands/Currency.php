<?php

namespace App\Console\Commands;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class Currency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:market';

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
     * @return mixed
     */
    public function handle()
    {
DB::table('currency')->delete();
$range = range(1,78);
foreach($range as $range2){
$getsomething = new Endpointsv2($range2);
foreach ($getsomething->getCurrency()[0] as $insertArr)
if(isset($insertArr['USER'],$insertArr['OFFER'],$insertArr['FOR'],$insertArr['MONEY'],$insertArr['RATE'],$insertArr['DATE'],$insertArr['U_NAME']))

$test =  DB::table('currency')->updateOrInsert(
    array('USER'=> $insertArr['USER'],'OFFER' => $insertArr['OFFER'],'FOR' => $insertArr['FOR'],'MONEY' => $insertArr['MONEY'],'RATE' => $insertArr['RATE'],'DATE' => $insertArr['DATE'],'U_NAME' => $insertArr['U_NAME']),
    array('USER'=> $insertArr['USER'],'OFFER' => $insertArr['OFFER'],'FOR' => $insertArr['FOR'],'MONEY' => $insertArr['MONEY'],'RATE' => $insertArr['RATE'],'DATE' => $insertArr['DATE'],'U_NAME' => $insertArr['U_NAME'])
);
}
echo 'JOB IS DONE';
}
    
}

