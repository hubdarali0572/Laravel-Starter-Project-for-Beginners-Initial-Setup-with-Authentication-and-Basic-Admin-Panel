<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LogsClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    // Run this command with: php artisan app:logs-clear
    
    protected $signature = 'app:logs-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $logPath = storage_path('logs');

        // Check if logs folder exists
        if (!file_exists($logPath)) {
            $this->warn('Logs folder does not exist.');
            return;
        }

        // Get all log files
        $logFiles = glob($logPath . '/*.log');

        if (empty($logFiles)) {
            $this->info('No log files found to delete.');
            return;
        }

        // Delete each log file
        foreach ($logFiles as $file) {
            File::delete($file);
            $this->info("Deleted log file: " . basename($file));
        }

        $this->info('All log files cleared successfully!');
    
    }
}
