<?php

namespace App\Events;

use App\Models\CourierProfile;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AcceptOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order_uid;
    public $courier;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $order_uid, CourierProfile $courier)
    {
        $this->order_uid = $order_uid;
        $this->courier = $courier;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('order.' . $this->order_uid);
    }
}
