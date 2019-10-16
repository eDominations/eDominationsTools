<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;

class PlayerUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:update';

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
        $range = range(1,78);
        foreach($range as $range2){
        $getsomething = new Endpointsv2($range2);
        foreach ($getsomething->getCitizenship() as $obj)
        foreach ($obj as $insertArr)
        $test =  DB::table('players')->where('ID', $insertArr)->update(
        array('Name'=>$insertArr['Name'],'Level'=> $insertArr['Level'],'Strength' => $insertArr['Strength'],'LastSeen' => $insertArr['LastSeen'],'DMG1HIT' => $insertArr['DMG1HIT'],'LastSeenAgo' => $insertArr['LastSeenAgo'],'Banned' => $insertArr['Banned'],'MilitaryRank' => $insertArr['MilitaryRank'])
        ); }

echo 'JOB IS DONE';
    }
}
