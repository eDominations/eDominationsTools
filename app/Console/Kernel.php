<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\BattleUpdate',
        'App\Console\Commands\FastUpdatePlayer',
        'App\Console\Commands\PlayerUpdate',
        'App\Console\Commands\PlayerUpdate2',
	'App\Console\Commands\PlayerUpdate3',
        'App\Console\Commands\last7days',
	'App\Console\Commands\Resources',
	'App\Console\Commands\muinsert2',
	'App\Console\Commands\last35days',
	'App\Console\Commands\currency'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('battle:update')
                 ->everyTenMinutes();
	$schedule->command('currency:market')
		 ->everyTenMinutes();
	$schedule->command('resources:insert')
		 ->hourly();
	$schedule->command('mu:insert2')
		 ->everyTenMinutes();
        $schedule->command('fast:updateplayer')
                 ->everyThirtyMinutes();
        $schedule->command('player:update')                
                 ->hourly();
        $schedule->command('player:update2')                
                 ->daily();
	$schedule->command('last7:days')
                 ->daily();
	$schedule->command('player:update3')
		 ->daily();
	$schedule->command('last35:days')
                 ->daily();
	$schedule->command('command:muinsert')
		 ->daily();    
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
