<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;
use Laravel\Socialite\Facades\Socialite;

class CreateGoogleLoginRedirectUrlTask extends ParentTask
{
    /**
     * Create link to Google authentication page
     *
     * @return string Redirect url for Google login
     */
    public function run(): string
    {
        return Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
    }
}
