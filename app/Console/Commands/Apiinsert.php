<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;
class Apiinsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:apiinsert';

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
  //##### FOR MU DATA INSERT   
       //  $range = range(1007,1010);
      //   foreach($range as $range2){
       //  $getsomething = new Endpointsv2($range2);
      //   foreach ($getsomething->getMilitaryUnit() as $obj) 
               
     //   $test =  DB::table('mudetails')->updateOrInsert(
     //   array('ID'=>$obj['ID'],'militaryunit'=>$obj['MilitaryUnit'],'Country'=> $obj['Country']),
     //   array('ID'=>$obj['ID'],'militaryunit'=>$obj['MilitaryUnit'],'Country'=> $obj['Country']) );
    //    }
            
        
    //    echo 'JOB IS DONE';


##SAVAŞ GEÇMİŞİ (BATTLE HISTORY INSERT)##
     // foreach(range(19400,22000) as $range){
   //  $getsomething = new Endpointsv2($range);
   //  foreach ($getsomething->getBattles()[0] as $obj) {
   //   foreach ($obj as $key => $value) {
  //    $insertArr[str_slug($key,'')] = $value;
//} 
            
  //   $test =  DB::table('battlehist')->updateOrInsert(
  //   array('ID'=>$insertArr['id'],'attacker'=>$insertArr['attacker'],'attackerslug'=>$insertArr['attackerslug'],'defenderslug'=>$insertArr['defenderslug'],'type'=>$insertArr['type'],'defender'=> $insertArr['defender'],'region' => $insertArr['region'],'round' => $insertArr['round'],'roundatt' => $insertArr['roundatt'],'rounddef' => $insertArr['rounddef'],'date' => $insertArr['date'],'wall1' => $insertArr['wall1'],'wall2' => $insertArr['wall2'],'wall3' => $insertArr['wall3']),
  //   array('ID'=>$insertArr['id'],'attacker'=>$insertArr['attacker'],'attackerslug'=>$insertArr['attackerslug'],'defenderslug'=>$insertArr['defenderslug'],'type'=>$insertArr['type'],'defender'=> $insertArr['defender'],'region' => $insertArr['region'],'round' => $insertArr['round'],'roundatt' => $insertArr['roundatt'],'rounddef' => $insertArr['rounddef'],'date' => $insertArr['date'],'wall1' => $insertArr['wall1'],'wall2' => $insertArr['wall2'],'wall3' => $insertArr['wall3'])
 //);
//}}
// echo 'JOB IS DONE';

###SAVAŞ İÇİN UPDATE (ID INSERTLENMİŞ OLMALI-- !!!!CRONA BAĞLANACAK OLAN BU)###

 //foreach(range(19199,22000) as $range){
 //$getsomething = new Endpointsv2($range);
 //foreach ($getsomething->getBattles()[0] as $obj) {
 //foreach ($obj as $key => $value) {
 //$insertArr[str_slug($key,'')] = $value;
 //} 
  //$test =  DB::table('battlehist')->where('ID', $range)->update(
  //array('attacker'=>$insertArr['attacker'],'attackerslug'=>$insertArr['attackerslug'],'defenderslug'=>$insertArr['defenderslug'],'type'=>$insertArr['type'],'defender'=> $insertArr['defender'],'region' => $insertArr['region'],'round' => $insertArr['round'],'roundatt' => $insertArr['roundatt'],'rounddef' => $insertArr['rounddef'],'date' => $insertArr['date'],'wall1' => $insertArr['wall1'],'wall2' => $insertArr['wall2'],'wall3' => $insertArr['wall3'])
  //);
 //}}
 // echo 'JOB IS DONE';

###VATANDAŞ (PLAYER INSERT) ##
  //  $range = range(55393,59399);
  //  foreach($range as $range2){
 //   $getsomething = new Endpointsv2($range2);
 //   foreach ($getsomething->getCitizen() as $insertArr)
  //             
 //  $test =  DB::table('players')->updateOrInsert(
 //  array('ID'=>$insertArr['ID'],'Name'=>$insertArr['Name'],'Level'=> $insertArr['Level'],'CS' => $insertArr['CS'],'Strength' => $insertArr['Strength'],'LastSeen' => $insertArr['LastSeen'],'DMG1HIT' => $insertArr['DMG1HIT'],'LastSeenAgo' => $insertArr['LastSeenAgo'],'Banned' => $insertArr['Banned'],'MilitaryRank' => $insertArr['MilitaryRank'],'TotalDMG' => $insertArr['TotalDMG']),
 //  array('ID'=>$insertArr['ID'],'Name'=>$insertArr['Name'],'Level'=> $insertArr['Level'],'CS' => $insertArr['CS'],'Strength' => $insertArr['Strength'],'LastSeen' => $insertArr['LastSeen'],'DMG1HIT' => $insertArr['DMG1HIT'],'LastSeenAgo' => $insertArr['LastSeenAgo'],'Banned' => $insertArr['Banned'],'MilitaryRank' => $insertArr['MilitaryRank'],'TotalDMG' => $insertArr['TotalDMG'])
 // ); }

// echo 'JOB IS DONE';

###VATANDAŞ (PLAYER UPDATE --- !!!! CRONA BAĞLANACAK) ##
// $range = range(100,15000);
// foreach($range as $range2){
//  $getsomething = new Endpointsv2($range2);
//  foreach ($getsomething->getCitizen() as $insertArr)
           
//$test =  DB::table('players')->where('ID', $range2)->update(
//array('Name'=>$insertArr['Name'],'Level'=> $insertArr['Level'],'CS' => $insertArr['CS'],'Strength' => $insertArr['Strength'],'LastSeen' => $insertArr['LastSeen'],'DMG1HIT' => $insertArr['DMG1HIT'],'LastSeenAgo' => $insertArr['LastSeenAgo'],'Banned' => $insertArr['Banned'],'MilitaryRank' => $insertArr['MilitaryRank'],'TotalDMG' => $insertArr['TotalDMG'])
//); }

//echo 'JOB IS DONE';


##HIZLI VATANDAŞ UPDATE - MU ÜZERİNDEN (LVL VE LASTSEENAGO YOK BURDA)##
//$range = range(1,1009);
//            foreach($range as $range2){
 //            $getsomething = new Endpointsv2($range2);
 //            foreach ($getsomething->getUnitMembers() as $insertArr)
                      
 //          $test =  DB::table('players')->where('ID', $insertArr['ID'])->update(
 //          array('Name'=>$insertArr['Name'],'DMG1HIT' => $insertArr['DMG1HIT'],'MilitaryRank2'=> $insertArr['MilitaryRank'],'Strength' => $insertArr['Strength'],'MilitaryUnitID' => $range2,'RankPoint' => $insertArr['Rank'])
 //          );
 //        }
//         echo 'JOB IS DONE';
    }
}
