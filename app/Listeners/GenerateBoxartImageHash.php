<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\GenerateBoxartImageHashJob;

class GenerateBoxartImageHash
{
    /**
     * Create the event listener.
     */
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
        $boxart = $event->boxart;
        // Dispatch the job to generate the image hash
        GenerateBoxartImageHashJob::dispatch($boxart);
    }
}
