<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Socialite;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('handleLogout');
    }

    public function redirectToDiscord()
    {
        return Socialite::with('discord')->setScopes(['identify'])->redirect();
    }

    public function handleDiscordCallback()
    {
        if ($user = Socialite::with('discord')->user())
        {
            $userAuth = User::updateOrCreate(
                ['userid' => $user->getId()],
                [
                    'username'      => $user->getName(),
                    'discrim'       => $user['discriminator'],
                    'avatar'        => $user->avatar,
                    'access_token'  => $user->token
                ]
            );

            if (is_null($userAuth->api_key))
            {
                $this->genAPIKey($userAuth);
            }

            Auth::loginUsingId($userAuth->id);
            return redirect()->intended('/');
        }
    }

    public function handleLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    private function genAPIKey (User $user)
    {
        $apikey = Str::random(32);
        while (!is_null(User::where('api_key', $apikey)->first()))
        {
            $apikey = Str::random(32);
        }
        $user->api_key = $apikey;
        $user->save();
    }
}
