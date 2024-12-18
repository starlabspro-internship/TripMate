<?php

namespace App\Events;
use App\Models\Rating;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EndTrip implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $user;
    public $message;
    public $driver;
    public $tripId;
    public function __construct($message, $user, $driver, $tripId, $data = null)
    {
        $this->user = $user;
        $this->driver = $driver;
        $this->tripId = $tripId;
        if ($data === null) {
            $this->data = $message;
        } else {
            $this->data = $message;
            foreach ($data as $key => $value) {
                $this->data = str_replace("{{ $key }}", $value, $this->data);
            }
        }

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('endtrip' . $this->user);
    }

    public function broadcastAs(){
        return 'endtrip';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->data,
            'user_id' => $this->user,
            'driver' => $this->driver,
            'tripId' => $this->tripId,
        ];
    }
}