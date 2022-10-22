<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\Authentication\Exceptions\UnauthenticatedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Auth;

class CreateAccessTokenForAuthenticatedUserTask extends ParentTask
{
    /**
     * Create new personal access token for authenticated user.
     *
     * @return string User personal access token.
     * @throws UnauthenticatedException
     */
    public function run(): string
    {
        if(!Auth::guard('web')->check()) {
            throw new UnauthenticatedException();
        }

        return Auth::guard('web')
            ->user()
            ->createToken('auth-token')
            ->accessToken;
    }
}
