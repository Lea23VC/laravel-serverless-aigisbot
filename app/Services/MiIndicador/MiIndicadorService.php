<?php

namespace App\Services\MiIndicador;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanSendGetRequests;
use App\Services\Concerns\CanSendPostRequests;
use App\Services\Concerns\CanSendPutRequests;
use App\Services\MiIndicador\Resources\MiIndicadorResource;

class MiIndicadorService
{
    use CanSendGetRequests;
    use CanSendPostRequests;
    use CanSendPutRequests;
    use BuildBaseRequest;

    private readonly string $token;

    public function __construct(
        private readonly string $baseUrl,
    ) {
    }

    public function tcgScraper(): MiIndicadorResource
    {
        return new MiIndicadorResource(
            service: $this,
        );
    }
}
