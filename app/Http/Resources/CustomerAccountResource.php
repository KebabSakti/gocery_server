<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerAccountResource extends JsonResource
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
            'username' => $this->username,
            'customer_profile_model' => new CustomerProfileResource($this->customer_profile_model),
            'customer_point_model' => new CustomerPointResource($this->customer_point_model),
            'customer_fcm_model' => new CustomerFcmResource($this->customer_fcm_model),
        ];
    }
}
