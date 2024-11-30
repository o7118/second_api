<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class socialcontroller extends Controller
{
    public function redirect()
    {
        //dd(env('GOOGLE_CLIENT_ID'));

        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleuser = Socialite::driver('google')->user();
            if($googleuser)
            {
                dd($googleuser);
            }
        try
        {
            $googleuser = Socialite::driver('google')->user();
            if($googleuser)
            {
                dd($googleuser);
            }
            // $user = 'john';//User::query()->where('email', $googleuser->email)->first();
            // if ($user)
            // {
            //     return response()->json([
            //         'message'=>'user found'
            //     ]);
            // }

            // else
            // {
            //     return response()->json([
            //         'message'=>'user not found'
            //     ]);
            // }
        }

        catch (\Exception $e)
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        // try {
        //     $googleUser = Socialite::driver('google')->user();

        //     // Process user data
        //     return response()->json([
        //         'name' => $googleUser->getName(),
        //         'email' => $googleUser->getEmail(),
        //         'avatar' => $googleUser->getAvatar(),
        //     ]);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }
}
