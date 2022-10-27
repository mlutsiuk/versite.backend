<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authorization\Actions\RevokeRolesFromUserAction;
use App\Containers\AppSection\Authorization\Data\Dto\RevokeRolesFromUserDto;
use App\Containers\AppSection\Authorization\UI\API\Requests\RevokeRolesFromUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RevokeRolesFromUserController extends ApiController
{
    /**
     * @param RevokeRolesFromUserRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UnknownProperties
     */
    public function revokeRolesFromUser(RevokeRolesFromUserRequest $request): array
    {
        $dto = new RevokeRolesFromUserDto($request->validated());
        $user = app(RevokeRolesFromUserAction::class)->run($dto);

        return $this->transform($user, UserTransformer::class, ['roles']);
    }
}
