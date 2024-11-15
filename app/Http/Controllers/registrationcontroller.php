<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerationrequest;
use App\Models\User;
use Illuminate\Http\Request;

class registrationcontroller extends Controller
{
    public function safe(registerationrequest $request)
    {
        User::create
        ([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number' => $request->number,
            'referral_code' => 1111,
            'password' => $request->password,
        ]);
        return response()->json
        ([
            'message' => 'lets gooo'
        ]);
    }
}
