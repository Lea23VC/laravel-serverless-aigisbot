<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Boxart;

class BoxartImageUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $boxart;

    /**
     * Create a new event instance.
     */
    public function __construct(Boxart $boxart)
    {
        //
        $this->boxart = $boxart;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
}
