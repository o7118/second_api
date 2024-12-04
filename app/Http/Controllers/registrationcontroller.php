<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerationrequest;
use App\Http\Resources\registerationresource;
use App\Models\User;

class registrationcontroller extends Controller
{
    public function safe(registerationrequest $request)
    {
        $referral_owner = User::query()->where('referral_code', $request->referral)->first();

        if($referral_owner)
        {
            $referral_owner->referral_point += 1;
            $referral_owner->save();
        }

        while(true)
        {
            $user_referral_code = rand(1111, 9999);
            if(!User::where('referral_code', $user_referral_code)->first())
            {
                $user_referral_code = rand(1111,9999);
                break;
            }
        }

        $user = User::create
        ([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'email_verified_at'=>false,
            'referral_code' => $user_referral_code,
            'referral_point' => 0,
            'password' => $request->password,
        ]);
        return response()->json
        ([
            'message' => 'user created', new registerationresource($user)
        ]);
    }
}
