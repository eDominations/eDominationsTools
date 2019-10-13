<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;

class MuInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:muinsert';

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
        $mu = DB::table('mudetails')->latest('ID')->first();        
        $range = range($mu->ID+1,1050);

        foreach($range as $range2){
        $getsomething = new Endpointsv2($range2);
        foreach ($getsomething->getMilitaryUnit() as $obj) 
               
    $test =  DB::table('mudetails')->updateOrInsert(
    array('ID'=>$obj['ID'],'militaryunit'=>$obj['MilitaryUnit'],'Country'=> $obj['Country']),
    array('ID'=>$obj['ID'],'militaryunit'=>$obj['MilitaryUnit'],'Country'=> $obj['Country']) );
      }
    }
}
