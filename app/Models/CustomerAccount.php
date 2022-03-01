<?php

namespace App\Models;

use App\Models\CustomerFcm;
use App\Models\CustomerPoint;
use App\Models\CustomerProfile;
use App\Models\ProductFavourite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CustomerAccount extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function customer_profile_model()
    {
        return $this->hasOne(CustomerProfile::class, 'customer_account_uid', 'uid');
    }

    public function customer_point_model()
    {
        return $this->hasOne(CustomerPoint::class, 'customer_account_uid', 'uid');
    }

    public function customer_fcm_model()
    {
        return $this->hasOne(CustomerFcm::class, 'customer_account_uid', 'uid');
    }

    public function product_favourites()
    {
        return $this->hasMany(ProductFavourite::class, 'customer_account_uid', 'uid');
    }
}
