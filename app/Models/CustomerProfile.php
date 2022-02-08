<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the CustomerProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer_account_model()
    {
        return $this->belongsTo(CustomerAccount::class, 'uid', 'customer_account_uid');
    }
}
