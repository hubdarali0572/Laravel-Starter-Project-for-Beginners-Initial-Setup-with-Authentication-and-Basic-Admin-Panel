<?php

use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule your database backup command to run at 12:00 AM every day
Schedule::command('app:database-back-up')->dailyAt('00:00');

// Schedule your cache clear command to run hourly
Schedule::command('app:cache-clear')->hourly();

// Schedule your logs clear command to run at every 5 hours
Schedule::command('app:logs-clear')->cron('0 */5 * * *');
