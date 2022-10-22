<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Exceptions\UnauthenticatedException;
use App\Containers\AppSection\Authentication\Tasks\CreateAccessTokenForAuthenticatedUserTask;
use App\Containers\AppSection\Authentication\Tasks\GetGoogleSocialiteUserTask;
use App\Containers\AppSection\Authentication\Tasks\RegisterUserFromGoogleTask;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Auth;

class HandleGoogleLoginCallbackAction extends ParentAction
{
    /**
     * Handle Google login callback, login or create new account.
     *
     * @return string User personal access token.
     * @throws UnauthenticatedException
     */
    public function run(): string
    {
        $socialiteUser = app(GetGoogleSocialiteUserTask::class)->run();

        $user = User::where('email', $socialiteUser->email)->first();
        if (!$user) {
            $user = app(RegisterUserFromGoogleTask::class)->run($socialiteUser);
        }

        Auth::guard('web')->login($user);

        return app(CreateAccessTokenForAuthenticatedUserTask::class)->run();
    }
}
