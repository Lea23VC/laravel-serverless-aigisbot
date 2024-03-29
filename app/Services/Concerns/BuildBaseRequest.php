<?php

declare(strict_types=1);

namespace App\Services\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait BuildBaseRequest
{


    public function buildWithAuthToken(): PendingRequest
    {
        return $this->buildRequest()->withHeaders([
            'X-AUTH-TOKEN' => $this->authToken,
        ]);
    }

    public function buildWithHeaders(array $headers): PendingRequest
    {
        return $this->buildRequest()->withHeaders($headers);
    }

    public function buildRequest(): PendingRequest
    {

        return $this->withBaseUrl();
    }

    public function withBaseUrl(string $baseUrl = null): PendingRequest
    {
        return Http::baseUrl(
            url: $baseUrl ?? $this->baseUrl,
        );
    }
}
