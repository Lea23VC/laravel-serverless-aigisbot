<?php

namespace App\Services\TCGScraper;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanSendGetRequests;
use App\Services\Concerns\CanSendPostRequests;
use App\Services\Concerns\CanSendPutRequests;
use App\Services\TCGScraper\Resources\TCGScraperResource;

class TCGScraperService
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

    public function tcgScraper(): TCGScraperResource
    {
        return new TCGScraperResource(
            service: $this,
        );
    }
}
