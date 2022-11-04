<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\HandleGoogleLoginCallbackAction;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\WebController;

class GoogleLoginController extends WebController
{
    /**
     * @throws CreateResourceFailedException
     * @throws LoginFailedException
     */
    public function handleCallback()
    {
        $accessToken = app(HandleGoogleLoginCallbackAction::class)->run();

        return view('appSection@authentication::google-callback', [
            'payload' => [
                'token_type' => 'Bearer',
                'expires_in' => config('apiato.api.expires-in'),
                'access_token' => $accessToken
            ]
        ]);
    }
}
