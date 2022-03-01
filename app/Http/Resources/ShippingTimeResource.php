<?php

namespace App\Http\Resources;

use App\Services\UtilityService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingTimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $formattedTime = Carbon::createFromTimeString($this->time, 'Asia/Kuala_Lumpur')->format('h:i A');

        return [
            'uid' => $this->uid,
            'time' => $formattedTime,
            'enable' => UtilityService::timeIsEnabled($this->time),
        ];
    }
}
