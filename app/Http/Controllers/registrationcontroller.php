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
        $user = User::create
        ([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number' => $request->number,
            'email_verified_at'=>false,
            'referral_code' => rand(1111,9999),
            'referral_point' => 0,
            'password' => $request->password,
        ]);
        return response()->json
        ([
            'message' => 'user created', new registerationresource($user)
        ]);
    }
}
