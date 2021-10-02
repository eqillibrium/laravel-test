<?php

namespace App\Services;

use App\Contract\Social;
use App\Events\UserEvent;
use App\Models\User as Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
    public function socialLogin(User $user) : string
    {
        $checkUser = Model::where('email', $user->getEmail())->first();

        if($checkUser) {
            $checkUser->name   = $user->getName();
            $checkUser->avatar = $user->getAvatar();

            if($checkUser->save()) {
                \Auth::loginUsingId($checkUser->id);
                event(new UserEvent($checkUser));
                return route('account');
            }
        }
        $temporaryPassword = Str::random(8);
        $newUser = Model::create([
            'name'       => $user->getName(),
            'email'      => $user->getEmail(),
            'password'   => Hash::make($temporaryPassword),
            'is_admin'   => false,
            'avatar'     => $user->getAvatar(),
        ]);
        if($newUser) {
            \Auth::loginUsingId($newUser->id);
            event(new UserEvent($newUser));
            return route('updatePassword.create');
        }
    }
}
