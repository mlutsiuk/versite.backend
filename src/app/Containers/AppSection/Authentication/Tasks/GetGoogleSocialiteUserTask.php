<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\GithubProvider;

class GetGoogleSocialiteUserTask extends ParentTask
{
    /**
     * Get user from Google callback
     *
     * @return User
     */
    public function run(): User
    {
        /** @var GithubProvider $provider */
        $provider = Socialite::driver('google');

        return $provider->stateless()->user();
    }
}
