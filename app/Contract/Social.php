<?php

namespace App\Contract;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function socialLogin(User $user) : string;
}
