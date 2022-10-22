<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Data\Dto\PasswordLoginDto;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Auth;

class PasswordLoginAction extends ParentAction
{
    /**
     * Try to log in and return personal token
     *
     * @param PasswordLoginDto $dto Provided user credential
     * @return string User personal access token.
     * @throws LoginFailedException
     */
    public function run(PasswordLoginDto $dto): string
    {
        $loggedIn = Auth::guard('web')
            ->attempt($dto->toArray());

        if (!$loggedIn) {
            throw new LoginFailedException();
        }

        return Auth::guard('web')
            ->user()
            ->createToken('auth-token')
            ->accessToken;
    }
}