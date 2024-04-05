<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Controleer de database op geplande ritten waarvan de geplande tijd is bereikt
            // en update deze naar "Lopende Ritten"
            \App\Models\Rit::where('scheduled_pickup_time', '<=', now())
                ->where('status', 'geplandeRitten')
                ->update(['status' => 'Lopende Ritten']);
        })->everyMinute(); 
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
