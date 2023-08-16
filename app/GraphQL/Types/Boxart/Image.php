<?php

namespace App\GraphQL\Types\Boxart;

use Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Boxart as BoxartModel;

final class Image
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke(BoxartModel $boxart, array $args)
    {
        // TODO implement the resolver
        $expiration = now()->addMinutes(1); // URL will be valid for 1 minute

        $image = $boxart->image;

        if (empty($image)) {
            return null;
        }

        $temporaryUrl = Storage::disk('s3')->temporaryUrl($boxart->image, $expiration);
        Log::info("temporaryUrl: " . $temporaryUrl);

        return  $temporaryUrl;
    }
}
