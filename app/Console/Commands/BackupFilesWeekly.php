<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class BackupFilesWeekly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run weekly backup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backupJob = BackupJobFactory::createFromArray(config('backup'));
        $backupJob->setFilename('weekly_' . date('Y-m-d') . '.zip');
        $backupJob->run();

        $this->info('Weekly backup completed successfully!');
    }
}
