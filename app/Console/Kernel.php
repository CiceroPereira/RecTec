<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\AltoDoCeu',
        'App\Console\Commands\Varzea',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:varzea')->everyMinute();
        $schedule->command('command:altoDoCeu')->everyMinute();
        $schedule->command('command:altoMandu')->everyMinute();
        $schedule->command('command:areia')->everyMinute();
        $schedule->command('command:boaVista')->everyMinute();
        /*$schedule->command('command:campinaDoBarreto')->everyMinute();
        $schedule->command('command:corregoDoJenipapo')->everyMinute();
        $schedule->command('command:doisUnidos')->everyMinute();
        $schedule->command('command:ibura')->everyMinute();
        $schedule->command('command:morroDaConceicao')->everyMinute();
        $schedule->command('command:pina')->everyMinute();
        $schedule->command('command:porto')->everyMinute();
        $schedule->command('command:sanMartin')->everyMinute();
        $schedule->command('command:santoAmaro')->everyMinute();
        $schedule->command('command:torreao')->everyMinute();
        $schedule->command('command:upaAltoBelaVista')->everyMinute();
        $schedule->command('command:upaImbiribeira')->everyMinute();
        $schedule->command('command:upaNovaDescoberta')->everyMinute();*/
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
