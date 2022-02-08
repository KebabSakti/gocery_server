<?php

namespace App\Http\Controllers\v1;

use App\Models\CustomerAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CustomerAccountResource;

class CustomerAccountController extends Controller
{
    public function show()
    {
        $user = CustomerAccount::find(Auth::user()->id);

        $resource = new CustomerAccountResource($user);

        return $resource;
        
    }
}