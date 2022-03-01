<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
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
            'title' => $this->title,
            'code' => $this->code,
            'description' => $this->description,
            'image' => $this->image,
            'max' => $this->max,
            'amount' => $this->amount,
            'min_order' => $this->min_order,
            'start_at' => $this->start_at,
            'expired_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->expired_at, 'Asia/Kuala_Lumpur')->locale('id_ID')->format('d F Y H:i:s'),
            'selected' => true,
        ];
    }
}
