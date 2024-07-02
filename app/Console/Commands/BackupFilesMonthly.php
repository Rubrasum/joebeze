<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class BackupFilesMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run monthly backup of files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backupJob = BackupJobFactory::createFromArray(config('backup'));
        $backupJob->setFilename('monthly_' . date('Y-m-d') . '.zip');
        $backupJob->run();

        $this->info('Monthly backup completed successfully!');
    }
}
