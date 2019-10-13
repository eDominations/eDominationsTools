<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PlayerUpdate2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:update2';

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
            ###VATANDAŞ (PLAYER UPDATE --- !!!! CRONA BAĞLANACAK) ##
$range = range(15000,30000);
foreach($range as $range2){
$getsomething = new Endpointsv2($range2);
foreach ($getsomething->getCitizen() as $insertArr)
           
$test =  DB::table('players')->where('ID', $range2)->update(
array('Name'=>$insertArr['Name'],'Level'=> $insertArr['Level'],'CS' => $insertArr['CS'],'Strength' => $insertArr['Strength'],'LastSeen' => $insertArr['LastSeen'],'DMG1HIT' => $insertArr['DMG1HIT'],'LastSeenAgo' => $insertArr['LastSeenAgo'],'Banned' => $insertArr['Banned'],'MilitaryRank' => $insertArr['MilitaryRank'],'TotalDMG' => $insertArr['TotalDMG'])
); }

echo 'JOB IS DONE';
    }
}
