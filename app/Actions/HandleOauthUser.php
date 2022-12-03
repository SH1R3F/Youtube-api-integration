<?php


namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HandleOauthUser
{


    public function handle($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            $authUser->update([
                'oauth_id'   => $user->id,
                'oauth_type' => $provider,
            ]);
        } else {
            $authUser = User::create([
                'oauth_id'   => $user->id,
                'oauth_type' => $provider,
                'name'       => $user->name,
                'email'      => $user->email,
                'password'   => Hash::make(Str::random(8))
            ]);
        }
        return $authUser;
    }
}
