<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class socialcontroller extends Controller
{
    public function redirect()
    {
        //dd(env('GOOGLE_CLIENT_ID'));
        session()->start();

        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $emaildetail = Socialite::driver('google')->stateless()->user();
        $fullname = $emaildetail->name;
        $firstname = explode(' ', $fullname)[0];
        $lastname = explode(' ', $fullname)[1];
        $email = $emaildetail->email;
        $user = User::where('email', $email)->first();
        if(!$user)
        {
            User::create([
                'first_name' => $emaildetail->$firstname,

            ]);
        }

        Auth::user($user);
        return response()->json([
            'message' => 'login successful',
            'user' => $user,
        ]);
    }
}
