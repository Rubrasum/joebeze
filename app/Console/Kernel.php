<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('backup:daily')
            ->daily()
            ->at('12:45')
            ->environments(['production'])
            ->before(function () {
                config(['backup.destination.disks.s3.path' => 'Files/Daily']);
            });

        $schedule->command('backup:weekly')
            ->weekly()
            ->sundays()
            ->at('01:00')
            ->environments(['production'])
            ->before(function () {
                config(['backup.destination.disks.s3.path' => 'Files/Weekly']);
            });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
