<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class BackupFilesYearly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:yearly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run yearly backup of files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $backupJob = BackupJobFactory::createFromArray(config('backup'));
        $backupJob->setFilename('yearly_' . date('Y-m-d') . '.zip');
        $backupJob->run();

        $this->info('Yearly backup completed successfully!');
    }
}
