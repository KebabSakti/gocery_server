<?php

namespace App\Services;

use App\Events\CourierRequestStatusEvent;
use App\Interfaces\CustomerEventServiceInterface;

class CustomerEventService implements CustomerEventServiceInterface
{
    public function courier_request_status($request)
    {
        event(new CourierRequestStatusEvent($request->partner_uid, $request));
    }
}
