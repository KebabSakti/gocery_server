<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
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
            'product_uid' => $this->product_uid,
            'uid' => $this->uid,
            'item_qty_total' => $this->item_qty_total,
            'item_price_total' => $this->item_price_total,
            'note' => $this->note,
            'product_model' => new ProductResource($this->product),
        ];
    }
}
