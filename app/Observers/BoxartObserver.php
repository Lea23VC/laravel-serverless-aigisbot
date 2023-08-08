<?php

namespace App\Observers;

use App\Models\Boxart;
use App\Events\BoxartImageUploaded;
use Illuminate\Support\Facades\Log;

class BoxartObserver
{

    protected static bool $dispatchingEvent = false;

    /**
     * Handle the Boxart "created" event.
     */
    public function created(Boxart $boxart): void
    {
        //
        event(new BoxartImageUploaded($boxart));
    }

    /**
     * Handle the Boxart "updated" event.
     */
    public function updated(Boxart $boxart): void
    {
        //
        Log::info('BoxartObserver::updated');

        if (!self::$dispatchingEvent) {
            self::$dispatchingEvent = true;

            $originalImage = $boxart->getOriginal('image');
            $currentImage = $boxart->image;

            if ($originalImage !== $currentImage) {
                event(new BoxartImageUploaded($boxart));
            }

            self::$dispatchingEvent = false;
        }
    }

    /**
     * Handle the Boxart "deleted" event.
     */
    public function deleted(Boxart $boxart): void
    {
        //
    }

    /**
     * Handle the Boxart "restored" event.
     */
    public function restored(Boxart $boxart): void
    {
        //
    }

    /**
     * Handle the Boxart "force deleted" event.
     */
    public function forceDeleted(Boxart $boxart): void
    {
        //
    }
}
