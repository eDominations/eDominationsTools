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
        'App\Console\Commands\PlayerUpdate4'
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
                 ->everyMinute()
                 ->withoutOverlapping();
        $schedule->command('fast:updateplayer')
                 ->everyThirtyMinutes()
                 ->withoutOverlapping();
        $schedule->command('player:update')                
                 ->cron('0 */3 * * *')
                 ->withoutOverlapping();
        $schedule->command('player:update2')                
                 ->cron('0 */3 * * *')
                 ->withoutOverlapping();
        $schedule->command('player:update3')                
                 ->cron('0 */3 * * *')
                 ->withoutOverlapping();
        $schedule->command('player:update4')                
                 ->cron('0 */3 * * *')
                 ->withoutOverlapping();
    
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
