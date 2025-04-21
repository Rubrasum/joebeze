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
        try {
            // Get app name and convert spaces to underscores
            $appName = str_replace(' ', '_', config('app.name'));

            // Create and run the backup
            $backupJob = BackupJobFactory::createFromArray(config('backup'));
            $backupJob->setFilename("{$appName}_monthly_" . date('Y-m-d') . '.zip');
            $backupJob->run();
            $this->info('Monthly backup completed successfully!');
        } catch (\Exception $e) {
            $this->error('Monthly backup failed: ' . $e->getMessage());
        }
    }
}
