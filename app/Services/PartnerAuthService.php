<?php

namespace App\Services;

use App\Interfaces\PartnerAuthServiceInterface;
use App\Models\CourierAccount;
use Illuminate\Support\Facades\Hash;

class PartnerAuthService implements PartnerAuthServiceInterface
{
    public function access($request)
    {
        $user = CourierAccount::where('username', $request->username)
            ->where('active', 1)
            ->firstOrFail();

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken($user->username)->plainTextToken;

            return $token;
        }

        abort(401);
    }

    public function revoke($request)
    {
        $user = $request->user();

        $user->tokens()->delete();
    }
}
