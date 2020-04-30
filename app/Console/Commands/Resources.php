<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Support\Facades\DB;

class Resources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resources:insert';

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
	DB::table('resources')->delete();
        $range = range(1,78);
        foreach($range as $range2){
        $getsomething = new Endpointsv2($range2);
        foreach ($getsomething->getMap() as $obj)
        foreach ($obj as $insertArr)
        $test =  DB::table('resources')->updateOrInsert(
        array('Name'=> $insertArr['Name'],'Slug' => $insertArr['Slug'],'Resource' => $insertArr['Resource'][0],'OwnerOriginal' => $insertArr['OwnerOriginal'],'OwnerCurrent' => $insertArr['OwnerCurrent']),
        array('Name'=> $insertArr['Name'],'Slug' => $insertArr['Slug'],'Resource' => $insertArr['Resource'][0],'OwnerOriginal' => $insertArr['OwnerOriginal'],'OwnerCurrent' => $insertArr['OwnerCurrent'])
        ); }

echo 'JOB IS DONE';
    }
}

