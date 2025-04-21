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
            ->dailyAt('00:30')
            ->when(fn () => app()->environment('production'))
            ->appendOutputTo(storage_path('logs/backup-daily.log'));

        $schedule->command('backup:weekly')
            ->weeklyOn(0, '01:00') // 0 = Sunday
            ->when(fn () => app()->environment('production'))
            ->appendOutputTo(storage_path('logs/backup-weekly.log'));

        $schedule->command('backup:monthly')
            ->monthlyOn(1, '01:30')
            ->when(fn () => app()->environment('production'))
            ->appendOutputTo(storage_path('logs/backup-monthly.log'));

        $schedule->command('backup:yearly')
            ->yearlyOn(1, 1, '02:00')
            ->when(fn () => app()->environment('production'))
            ->appendOutputTo(storage_path('logs/backup-yearly.log'));

        $schedule->command('backup:clean')
            ->dailyAt('02:30')
            ->when(fn () => app()->environment('production'))
            ->appendOutputTo(storage_path('logs/backup-clean.log'));
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
