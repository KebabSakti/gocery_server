<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentChannelResource extends JsonResource
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
            'uid' => $this->uid,
            'channel_code' => $this->channel_code,
            'name' => $this->name,
            'currency' => $this->currency,
            'channel_category' => $this->channel_category,
            'picture' => $this->picture,
            'fee' => $this->fee,
            'fee_type' => $this->fee_type,
            'min' => $this->min,
            'max' => $this->max];
    }
}
