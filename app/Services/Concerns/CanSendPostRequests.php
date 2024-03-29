<?php

declare(strict_types=1);

namespace App\Services\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

trait CanSendPostRequests
{
    public function post(PendingRequest $request, string $url, array $payload = []): Response
    {


        return $request->post(
            url: $url,
            data: $payload,
        );
    }
}
