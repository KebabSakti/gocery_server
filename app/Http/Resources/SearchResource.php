<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
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
            'keyword' => $this->keyword,
            'search_count' => $this->search_count,
        ];
    }
}
