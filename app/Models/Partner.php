<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function couriers()
    {
        return $this->hasMany(CourierAccount::class, 'partner_uid', 'uid');
    }
}
