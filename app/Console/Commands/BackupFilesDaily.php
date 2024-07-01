<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class BackupFilesDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run daily backup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backupJob = BackupJobFactory::createFromArray(config('backup'));
        $backupJob->setFilename('daily_' . date('Y-m-d') . '.zip');
        $backupJob->run();

        $this->info('Daily backup completed successfully!');
    }
}
