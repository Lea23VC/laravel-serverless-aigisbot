<?php

namespace App\Providers;

use App\Services\MiIndicador\MiIndicadorService;
use Illuminate\Support\ServiceProvider;

class MiIndicadorProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->app->singleton(
            abstract: MiIndicadorService::class,
            concrete: fn () => new MiIndicadorService(
                baseUrl: config('services.mi_indicador.base_url', null),
            ),
        );
    }
}
