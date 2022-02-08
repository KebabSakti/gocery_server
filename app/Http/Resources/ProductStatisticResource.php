<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductStatisticResource extends JsonResource
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
            'product_uid' => $this->product_uid,
            'uid' => $this->uid, 
            'favourite' => $this->favourite,
            'view' => $this->view,
            'sold' => $this->sold,
        ];
    }
}
