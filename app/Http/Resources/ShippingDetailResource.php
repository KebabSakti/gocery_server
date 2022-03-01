<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'order_uid' => $this->order_uid,
            'partner_uid' => $this->partner_uid,
            'uid' => $this->uid,
            'shipping' => $this->shipping,
            'distance' => $this->distance,
            'distance_unit' => $this->distance_unit,
            'price' => $this->price,
            'time' => $this->time,
        ];
    }
}
