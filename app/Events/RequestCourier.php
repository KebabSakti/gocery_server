<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RequestCourier implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $partner_uid;
    public $order_uid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $partner_uid, String $order_uid)
    {
        $this->partner_uid = $partner_uid;
        $this->order_uid = $order_uid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('partner.' . $this->partner_uid);
    }
}
