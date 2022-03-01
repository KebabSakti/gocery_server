<?php

namespace App\Http\Resources;

use App\Services\UtilityService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderFeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $now = Carbon::now('Asia/Kuala_Lumpur')->toTimeString();

        return [
            "uid" => $this->uid,
            "name" => $this->name,
            "address" => $this->address,
            "phone" => $this->phone,
            "shipping" => $this->shipping,
            "type" => $this->type,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "exclusive" => $this->exclusive,
            "online" => $this->online,
            "distance" => (string) round($this->distance, 1),
            "distance_unit" => 'km',
            "price" => (string) UtilityService::getShippingFee($this),
            "time" => UtilityService::getClosestShippingTime($this),
        ];
    }
}
