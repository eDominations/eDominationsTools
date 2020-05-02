<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;

class BattleUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'battle:update';

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


        ###SAVAŞ İÇİN UPDATE (ID INSERTLENMİŞ OLMALI-- !!!!CRONA BAĞLANACAK OLAN BU)###
 $bat = DB::table('battles')->first();
 foreach(range(24000,$bat->ID-1) as $range){
 $getsomething = new Endpointsv2($range);
 foreach ($getsomething->getBattles()[0] as $obj) {
 foreach ($obj as $key => $value) {
 $insertArr[str_slug($key,'')] = $value;
 }
 $test =  DB::table('battlehist')->where('ID', $range)->update(
    array('attacker'=>$insertArr['attacker'],'attackerslug'=>$insertArr['attackerslug'],'defenderslug'=>$insertArr['defenderslug'],'type'=>$insertArr['type'],'defender'=> $insertArr['defender'],'region' => $insertArr['region'],'round' => $insertArr['round'],'roundatt' => $insertArr['roundatt'],'rounddef' => $insertArr['rounddef'],'date' => $insertArr['date'],'wall1' => $insertArr['wall1'],'wall2' => $insertArr['wall2'],'wall3' => $insertArr['wall3'])
 );
 }}
  echo 'JOB IS DONE';
     }
 }
 
 
