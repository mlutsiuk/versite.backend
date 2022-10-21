<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\LogoutAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\LogoutRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class LogoutController extends ApiController
{
    /**
     * Logout user (revoke current access token)
     *
     * @return JsonResponse
     */
    public function logout(LogoutRequest $request): JsonResponse
    {
        app(LogoutAction::class)->run();

        return $this->accepted([
            'message' => 'Token revoked successfully.',
        ]);
    }
}
