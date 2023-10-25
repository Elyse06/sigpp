<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        Commands\DeleteExpiredRecords::class,
        Commands\IncrementSoldeConge::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('expired:delete')->everyMinute();
        $schedule->command('increment:solde')->monthlyOn(28, '23:59');
        $schedule->command('reset:permission')->monthlyOn(28, '23:59');
        $schedule->command('reset:sortie')->monthlyOn(28, '23:59');
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
