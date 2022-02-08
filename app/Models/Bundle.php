<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bundle_items()
    {
        return $this->hasMany(BundleItem::class, 'bundle_uid', 'uid');
    }
}
