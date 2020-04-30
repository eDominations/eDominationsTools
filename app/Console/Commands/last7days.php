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

class last7days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'last7:days';

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
        DB::table('last7days')->delete();
        $date = \Carbon\Carbon::today()->subDays(7);
        $users = DB::table('battlehist')->whereDate('Date','>=', $date)->get();
        foreach($users as $usr){
        $usr2 = $usr->ID;
        $getsomething = new Endpointsv1($usr2);
        foreach ($getsomething->getBattleDamage() as $obj)


        
        DB::table('last7days')->updateOrInsert(
    array('ID2'=>$obj['ID'],'name'=>$obj['Name'],'dmg' => $obj['DMG'],'hits' => $obj['Hits'],'unit' => $obj['Unit']),
    array('ID2'=>$obj['ID'],'name'=>$obj['Name'],'dmg' => $obj['DMG'],'hits' => $obj['Hits'],'unit' => $obj['Unit'])
);}

echo 'JOB IS DONE';

 
        }}

