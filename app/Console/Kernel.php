<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\BackupFilesDaily::class,
        Commands\BackupFilesWeekly::class,
        Commands\BackupFilesMonthly::class,
        Commands\BackupFilesYearly::class,
    ];
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
            })->appendOutputTo(storage_path('logs/backup-daily.log'));

        $schedule->command('backup:weekly')
            ->weekly()
            ->sundays()
            ->at('01:00')
            ->environments(['production'])
            ->before(function () {
                config(['backup.destination.disks.s3.path' => 'Files/Weekly']);
            })->appendOutputTo(storage_path('logs/backup-daily.log'));

        $schedule->command('backup:monthly')
            ->monthlyOn(1)
            ->at('02:00')
            ->environments(['production'])
            ->before(function () {
                config(['backup.destination.disks.s3.path' => 'Files/Monthly']);
            })->appendOutputTo(storage_path('logs/backup-daily.log'));

        $schedule->command('backup:yearly')
            ->yearlyOn(1, 1)
            ->at('03:00')
            ->environments(['production'])
            ->before(function () {
                config(['backup.destination.disks.s3.path' => 'Files/Yearly']);
            })->appendOutputTo(storage_path('logs/backup-daily.log'));
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
