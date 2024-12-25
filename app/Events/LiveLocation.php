<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LiveLocation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $latitude;
    public $longitude;
    public $trip_id;

    public function __construct($latitude, $longitude, $trip_id)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->trip_id = $trip_id;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('trip.' . $this->trip_id);
    }
    public function broadcastAs()
    {
        return 'location.live'; // Name the event
    }

    public function broadcastWith()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'trip_id' => $this->trip_id,
        ];
    }
}
