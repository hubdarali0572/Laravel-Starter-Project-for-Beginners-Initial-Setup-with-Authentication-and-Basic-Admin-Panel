<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CacheClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    // Run this command with: php artisan app:cache-clear
    protected $signature = 'app:cache-clear';

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
        // 1. Clear all framework structural caches (Config, Route, View, Events, Compiled Services)

        Artisan::call('optimize:clear');
        $this->info('Framework bootstrap caches cleared.');

        // 2. Clear the actual application data (Redis, Database cache, etc.)
        
        Artisan::call('cache:clear');
        $this->info('Application data cache cleared.');
    }
}
