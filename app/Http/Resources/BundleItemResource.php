<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BundleItemResource extends JsonResource
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
            'bundle_uid' => $this->bundle_uid,
            'product_uid' => $this->product_uid,
            'uid' => $this->uid,
            'product_model' => new ProductResource($this->product)
        ];
    }
}
