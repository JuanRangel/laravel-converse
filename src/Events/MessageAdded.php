<?php

namespace JuanRangel\Converse\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use JuanRangel\Converse\Models\Message;

class MessageAdded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @param  Message  $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message->id,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('conversations.' . $this->message->conversation->id);
    }
}
