<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\HandleGoogleLoginCallbackAction;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\Tasks\CreateGoogleLoginRedirectUrlTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class GoogleLoginController extends ApiController
{
    /**
     * Create link to Google authentication page
     *
     * @return JsonResponse
     */
    public function redirect(): JsonResponse
    {
        $redirectUrl = app(CreateGoogleLoginRedirectUrlTask::class)->run();

        return response()->json([
            'url' => $redirectUrl
        ]);
    }

    /**
     * Handle Google login callback, login or create new account.
     *
     * @throws LoginFailedException
     * @throws CreateResourceFailedException
     */
    public function handleCallback(): JsonResponse
    {
        $accessToken = app(HandleGoogleLoginCallbackAction::class)->run();

        return $this->json([
            'token_type' => 'Bearer',
            'expires_in' => config('apiato.api.expires-in'),
            'access_token' => $accessToken
        ]);
    }
}
