<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;

class RegisterUserFromGoogleTask extends ParentTask
{
    /**
     * Register new user after Google auth with provided credentials
     *
     * @param \Laravel\Socialite\Contracts\User $socialiteUser
     * @return User
     */
    public function run(\Laravel\Socialite\Contracts\User $socialiteUser): User
    {
        $user = new User;
        $user->name = $socialiteUser->name;
        $user->email = $socialiteUser->email;
        $user->avatar = $socialiteUser->avatar;
        $user->email_verified_at = now();    // To prevent sending account verification email
        $user->save();

        return $user;
    }
}
