<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $boxart->update([
            'image_hash' => 'generated_hash_value', // Replace with the actual generated hash
        ]);
    }
}
