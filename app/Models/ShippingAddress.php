<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsToThrough(CustomerAccount::class, Order::class, 'uid', '', [Order::class => 'uid', ShippingAddress::class => 'uid', CustomerAccount::class => 'uid']);
    }
}
