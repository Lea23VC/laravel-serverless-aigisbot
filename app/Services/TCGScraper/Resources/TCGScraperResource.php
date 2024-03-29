<?php

namespace App\Services\TCGScraper\Resources;

use App\Services\TCGScraper\TCGScraperService;

class TCGScraperResource
{
    public function __construct(
        private readonly TCGScraperService $service,
    ) {
    }


    public function search(string $cardQuery, ?string $cardType)
    {
        $response = $this->service->get(
            url: "/api/v1/search/{$cardType}",
            query: ['name' => $cardQuery],
            request: $this->service->buildRequest()
        );

        return $response;
    }
}
