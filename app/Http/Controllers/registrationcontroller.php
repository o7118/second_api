<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerationrequest;
use App\Http\Resources\registerationresource;
use App\Models\User;
use Illuminate\Http\Request;

class registrationcontroller extends Controller
{
    public function safe(registerationrequest $request)
    {
        //check if reffral code is valid and add point to the owner of the code

        $referral_owner = User::query()->where('referral_code', $request->referral)->first();

        if($referral_owner)
        {
            $referral_owner->referral = 'hello';
            return response()->json(['message'=>'seen']);
        }

        //create user referralcode and check if it doesnt exist in the db
        
        $user_referral_code = rand(1111,9999);

        if(User::where('referral_code', $user_referral_code)->first())
        {
            $user_referral_code = rand(1111,9999);
        }

        // $user = User::create
        // ([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'number' => $request->number,
        //     'email_verified_at'=>false,
        //     'referral_code' => rand(1111,9999),
        //     'referral_point' => 0,
        //     'password' => $request->password,
        // ]);
        // return response()->json
        // ([
        //     'message' => 'user created', new registerationresource($user)
        // ]);
    }
}
