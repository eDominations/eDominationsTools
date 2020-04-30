<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv1;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class alltime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'all:time';

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
$bat = DB::table('battles')->first();
 $bat2 = DB::table('alltime')->orderBy('BATTLEID','DESC')->first();
                $bat3 = $bat2->BATTLEID+1;
        $bat1 = $bat->ID-1 ;
        foreach(range($bat3,$bat1) as $user){
        $getsomething = new Endpointsv1($user); 
        foreach ($getsomething->getBattleDamage() as $obj)

            DB::table('alltime')->updateOrInsert(
                array('ID2'=>$obj['ID'],'name'=>$obj['Name'],'dmg' => $obj['DMG'],'hits' => $obj['Hits'],'unit' => $obj['Unit'],'BATTLEID' => $user,'Side' => $obj['SIDE']),
                array('ID2'=>$obj['ID'],'name'=>$obj['Name'],'dmg' => $obj['DMG'],'hits' => $obj['Hits'],'unit' => $obj['Unit'],'BATTLEID' => $user,'Side' => $obj['SIDE'])
            );}

echo 'JOB IS DONE';
    
    }
}
