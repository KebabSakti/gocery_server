<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class OrderStatusEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $id;
    private $request;

    public function __construct(String $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    public function broadcastWith()
    {
        return $this->request->toArray();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('order.' . $this->id);
    }
}
