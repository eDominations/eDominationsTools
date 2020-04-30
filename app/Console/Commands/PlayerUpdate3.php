<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;

class PlayerUpdate3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:update3';

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

$rng = DB::table('players')->latest('ID')->first();
                  ###VATANDAŞ (PLAYER UPDATE --- !!!! CRONA BAĞLANACAK) ##
$range = range($rng->ID+1,69000);
foreach($range as $range2){
$getsomething = new Endpointsv2($range2);
foreach ($getsomething->getCitizen() as $insertArr)
           
$test =  DB::table('players')->updateOrInsert(
array('Name'=>$insertArr['Name'],'ID'=>$insertArr['ID'],'Level'=> $insertArr['Level'],'CS' => $insertArr['CS'],'Strength' => $insertArr['Strength'],'LastSeen' => $insertArr['LastSeen'],'DMG1HIT' => $insertArr['DMG1HIT'],'LastSeenAgo' => $insertArr['LastSeenAgo'],'Banned' => $insertArr['Banned'],'MilitaryRank' => $insertArr['MilitaryRank'],'TotalDMG' => $insertArr['TotalDMG'])
); }

echo 'JOB IS DONE';
    }
}
