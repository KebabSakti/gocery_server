<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingAddressResource extends JsonResource
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
            'order_uid' => $this->order_uid ?? '',
            'uid' => $this->uid ?? '',
            'place_id' => $this->place_id ?? '',
            'address' => $this->address ?? '',
            'latitude' => $this->latitude ?? '',
            'longitude' => $this->longitude ?? '',
            'note' => $this->note ?? '',
            'name' => $this->name ?? '',
            'phone' => $this->phone ?? '',
        ];
    }
}
