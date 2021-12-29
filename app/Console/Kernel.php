<?php

namespace App\Console;

use App\Jobs\NumberInfectionDateJob;
use App\Jobs\VaccinatorJob;
use App\Jobs\VnexpressJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // schedule by job
        $schedule->job(new VnexpressJob())->everyMinute();
        $schedule->job(new NumberInfectionDateJob())->everyMinute();
        $schedule->job(new VaccinatorJob())->everyMinute();

        // run jobs table to work queue
        $schedule->command('queue:work --stop-when-empty --tries=3')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
