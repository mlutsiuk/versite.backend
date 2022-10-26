<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\VerifyEmailAction;
use App\Containers\AppSection\Authentication\Data\Dto\VerifyEmailDto;
use App\Containers\AppSection\Authentication\Exceptions\InvalidEmailVerificationDataException;
use App\Containers\AppSection\Authentication\Notifications\EmailVerified;
use App\Containers\AppSection\Authentication\UI\API\Requests\VerifyEmailRequest;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class VerifyEmailController extends ApiController
{
    /**
     * @throws UnknownProperties
     * @throws InvalidEmailVerificationDataException|NotFoundException
     */
    public function verifyEmail(VerifyEmailRequest $request): JsonResponse
    {
        $dto = new VerifyEmailDto($request->validated());

        app(VerifyEmailAction::class)->run($dto);

        return $this->json(null);
    }
}
