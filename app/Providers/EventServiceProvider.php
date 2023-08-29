<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\BoxartImageUploaded;
use App\Listeners\GenerateBoxartImageHash;
use App\Models\Boxart;
use App\Observers\BoxartObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BoxartImageUploaded::class => [
            GenerateBoxartImageHash::class,
        ],

        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // ... other providers
            \SocialiteProviders\Auth0\Auth0ExtendSocialite::class . '@handle',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
        Boxart::observe(BoxartObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
