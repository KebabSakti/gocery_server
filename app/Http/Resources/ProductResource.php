<?php

namespace App\Http\Resources;

use App\Models\ProductStatistic;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category_uid' => $this->category_uid,
            'uid' => $this->uid,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'discount' => $this->discount,
            'final_price' => $this->final_price,
            'unit' => $this->unit,
            'unit_count' => $this->unit_count,
            'min_order' => $this->min_order,
            'max_order' => $this->max_order,
            'stok' => $this->stok,
            'point' => $this->point,
            'shipping' => $this->shipping,
            'type' => $this->type,
            'deeplink' => $this->deeplink,
            'favourite' => $request->user()->product_favourites()->where('product_uid', $this->uid)->first() != null,
            'product_statistic_model' => new ProductStatisticResource(ProductStatistic::where('product_uid', $this->uid)->first()),
        ];
    }
}
