<?php

namespace App\Providers;

use App\Services\TCGScraper\TCGScraperService;
use Illuminate\Support\ServiceProvider;

class TCGScraperProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->app->singleton(
            abstract: TCGScraperService::class,
            concrete: fn () => new TCGScraperService(
                baseUrl: config('services.tcg_scraper.base_url', null),
            ),
        );
    }
}
