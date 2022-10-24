<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\RegisterUserAction;
use App\Containers\AppSection\Authentication\Data\Dto\RegisterUserDto;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\UI\API\Requests\RegisterUserRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterUserController extends ApiController
{
    /**
     * Register user.
     *
     * @param RegisterUserRequest $request
     * @return JsonResponse
     * @throws UnknownProperties|LoginFailedException
     */
    public function registerUser(RegisterUserRequest $request): JsonResponse
    {
        $dto = new RegisterUserDto($request->validated());

        $accessToken = app(RegisterUserAction::class)->run($dto);

        return $this->json([
            'token_type' => 'Bearer',
            'expires_in' => config('apiato.api.expires-in'),
            'access_token' => $accessToken
        ]);
    }
}
