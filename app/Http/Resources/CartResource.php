<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'customer_account_uid' => $this->customer_account_uid,
            'uid' => $this->uid,
            'qty_total' => $this->qty_total,
            'price_total' => $this->price_total,
            'cart_items' => CartItemResource::collection($this->cart_items),
        ];
    }
}
