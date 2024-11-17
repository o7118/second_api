<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginrequest;
use App\Http\Resources\loginresource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class logincontroller extends Controller
{
    public function login(loginrequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user)
        {
            return response()->json([
                'message' => 'user not found'
            ]);
        };

        if(Hash::check($request->password, $user->password))
        {
            Auth::user($user);
            return response()->json([loginresource::class]);
        }

        else
        {
            return response()->json([
                'message' => 'password incorrect'
            ]);
        }
        
    }
}
