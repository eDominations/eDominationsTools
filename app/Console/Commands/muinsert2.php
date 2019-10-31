<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;

class MuInsert2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mu:insert2';

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
        ##### FOR MU DATA INSERT  
           
        $range = range(1,1022);

        foreach($range as $range2){
        $getsomething = new Endpointsv2($range2);
        foreach ($getsomething->getMilitaryUnit() as $obj) 
        
    $test =  DB::table('mudetails')->where('ID', $range2)->update(
    array('MilitaryUnit'=>$obj['MilitaryUnit'],'Country'=> $obj['Country'],'DailyOrder'=> $obj['DailyOrder']));
      }
    }
}

