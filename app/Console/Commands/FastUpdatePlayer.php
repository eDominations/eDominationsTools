<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;

class FastUpdatePlayer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fast:updateplayer';

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
         ##HIZLI VATANDAŞ UPDATE - MU ÜZERİNDEN (LVL VE LASTSEENAGO YOK BURDA)##
$range = range(1,1100);
            foreach($range as $range2){
            $getsomething = new Endpointsv2($range2);
           foreach ($getsomething->getUnitMembers() as $insertArr)
                      
         $test =  DB::table('players')->where('ID', $insertArr['ID'])->update(
          array('Name'=>$insertArr['Name'],'Energy'=>$insertArr['Energy'],'DMG1HIT' => $insertArr['DMG1HIT'],'MilitaryRank2'=> $insertArr['MilitaryRank'],'Strength' => $insertArr['Strength'],'MilitaryUnitID' => $range2,'RankPoint' => $insertArr['Rank'])
         );
       }
         echo 'JOB IS DONE';
    }
}
