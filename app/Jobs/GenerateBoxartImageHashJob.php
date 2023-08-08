<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Boxart;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as Image;

class GenerateBoxartImageHashJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $boxart;

    public function __construct(Boxart $boxart)
    {
        $this->boxart = $boxart;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $disk = Storage::disk('s3');
        $imagePath = $this->boxart->image; // Adjust the path if needed

        if ($disk->exists($imagePath)) {
            // Load the original image
            Image::configure(['driver' => 'imagick']);

            $originalImage = Image::make($disk->get($imagePath));

            // Create a blurred placeholder image
            $blurredImage = $originalImage->blur(10);

            // Encode the blurred image to base64
            $base64BlurredImage = $blurredImage->encode('data-url')->encoded;

            $this->boxart->update([
                'image_hash' => $base64BlurredImage,
            ]);
        }
    }
}
