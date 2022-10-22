<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\PasswordLoginAction;
use App\Containers\AppSection\Authentication\Data\Dto\PasswordLoginDto;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\UI\API\Requests\PasswordLoginRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PasswordLoginController extends ApiController
{
    /**
     * @throws UnknownProperties
     */
    public function login(PasswordLoginRequest $request): JsonResponse
    {
        $loginDto = new PasswordLoginDto($request->validated());

        try {
            $accessToken = app(PasswordLoginAction::class)->run($loginDto);

            return $this->json([
                'token_type' => 'Bearer',
                'expires_in' => config('apiato.api.expires-in'),
                'access_token' => $accessToken
            ]);
        } catch (LoginFailedException $e) {
            return $this->json([
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }
}
