<?php

namespace App\Services\MiIndicador\Resources;

use App\Services\MiIndicador\MiIndicadorService;

class MiIndicadorResource
{
    public function __construct(
        private readonly MiIndicadorService $service,
    ) {
    }


    public function getTodayIndicators()
    {
        $response = $this->service->get(
            url: "/api",
            request: $this->service->buildRequest()
        );

        return $response->json();
    }

    public function getLastTwoWeekDolarIndicators()
    {
        $response = $this->service->get(
            url: "/api/dolar",
            request: $this->service->buildRequest()
        );

        return $response->json();
    }
}
