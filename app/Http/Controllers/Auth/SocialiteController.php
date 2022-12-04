<?php

namespace App\Http\Controllers\Auth;

use App\Actions\HandleOauthUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider, HandleOauthUser $action)
    {
        try {
            $user = Socialite::driver($provider)->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $authUser = $action->handle($user, $provider);

        Auth::login($authUser, true);

        return redirect()->route('youtube');
    }
}
