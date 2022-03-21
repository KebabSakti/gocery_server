<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourierAccountResource extends JsonResource
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
            'partner_uid' => $this->partner_uid,
            'uid' => $this->uid,
            'username' => $this->username,
            'owner' => $this->owner,
            'profile' => new CourierProfileResource($this->profile),
        ];
    }
}
