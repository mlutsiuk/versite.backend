<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class GetGoogleSocialiteUserTask extends ParentTask
{
    /**
     * Get user from Google callback
     *
     * @return User
     */
    public function run(): User
    {
        return Socialite::driver('google')->stateless()->user();
    }
}
