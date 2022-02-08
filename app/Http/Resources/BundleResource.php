<?php

namespace App\Http\Resources;

use App\Models\BundleItem;
use Illuminate\Http\Resources\Json\JsonResource;

class BundleResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'products' => ProductResource::collection(
                BundleItem::select('products.*')
                          ->join('products', 'bundle_items.product_uid', '=', 'products.uid')
                          ->where('bundle_items.bundle_uid', $this->uid)
                          ->limit(10)
                          ->get()
            ),
        ];
    }
}
