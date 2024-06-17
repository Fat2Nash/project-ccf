<?php
namespace App\Events;

use App\Models\Engin;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CompteurHeuresUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $engin;

    /**
     * Create a new event instance.
     *
     * @param Engin $engin
     */
    public function __construct(Engin $engin)
    {
        $this->engin = $engin;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

