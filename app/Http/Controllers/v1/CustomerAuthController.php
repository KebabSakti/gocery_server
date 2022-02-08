<?php

namespace App\Http\Controllers\v1;

use Exception;
use App\Models\Point;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CustomerAccount;
use App\Models\CustomerProfile;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerAuthResource;
use App\Models\CustomerPoint;
use App\Models\CustomerPointHistory;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomerAuthController extends Controller
{
    public function access(Request $request)
    {
        try {
            $firebaseUser = $this->getFirebaseUser($request->token);

            $customer = CustomerAccount::where('username', $firebaseUser->providerData[0]->email)
                                        ->orWhere('username', $firebaseUser->providerData[0]->phoneNumber)
                                        ->first();

            if($customer == null) {
                $uid = Str::uuid();

                $customer = CustomerAccount::create([
                    'uid' => $uid,
                    'username' => $firebaseUser->providerData[0]->email ?? $firebaseUser->providerData[0]->phoneNumber,
                ]);

                //profile
                CustomerProfile::create([
                    'customer_account_uid'  => $uid,
                    'uid' => Str::uuid(),
                    'name' => $firebaseUser->providerData[0]->displayName,
                    'email' => $firebaseUser->providerData[0]->email,
                    'phone' => $firebaseUser->providerData[0]->phoneNumber,
                    'picture' => $firebaseUser->providerData[0]->photoUrl,
                ]);

                //point
                $this->point($uid);
            }

            $customerAuthResource = new CustomerAuthResource($customer);

            return $customerAuthResource;
        }catch(FailedToVerifyToken $e) {
            return response()->json([
                'message' => 'Akses tidak di izinkan'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        try {
            $customer = CustomerAccount::where('username', $request->email)
                                        ->orWhere('username', $request->phone)
                                        ->first();

            $profile = CustomerProfile::where('phone', $request->phone)->first();

            if($customer != null || $profile != null) {
                abort(400 , 'Email atau No hp sudah terdaftar');
            }

            $uid = Str::uuid();

            $customer = CustomerAccount::create([
                'uid' => $uid,
                'username' => $request->email,
            ]);

            //profile
            CustomerProfile::create([
                'customer_account_uid'  => $uid,
                'uid' => Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            //point
            $this->point($uid);

            $customerAuthResource = new CustomerAuthResource($customer);

            return $customerAuthResource;
        }catch(HttpException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->getStatusCode());
        }
    }

    public function revoke(Request $request)
    {
        $user = $request->user();

        $user->tokens()->delete();
        
    }

    private function getFirebaseUser($token)
    {
        $firebaseAuth = app('firebase.auth');
            
        $verifiedIdToken = $firebaseAuth->verifyIdToken($token);

        $uid = $verifiedIdToken->claims()->get('sub');

        $user = $firebaseAuth->getUser($uid);

        return $user;
    }

    private function point($customer_account_uid)
    {
        CustomerPoint::create([
            'customer_account_uid' => $customer_account_uid,
            'uid' => Str::uuid(),
            'point' => 0,

        ]);

        CustomerPointHistory::create([
            'customer_account_uid' => $customer_account_uid,
            'point' => 0,
            'action' => 'IN',
        ]);
    }
}