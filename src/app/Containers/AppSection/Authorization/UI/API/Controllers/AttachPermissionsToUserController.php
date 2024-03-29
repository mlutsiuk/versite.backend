<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authorization\Actions\AttachPermissionsToUserAction;
use App\Containers\AppSection\Authorization\Data\Dto\AttachPermissionsToUserDto;
use App\Containers\AppSection\Authorization\UI\API\Requests\AttachPermissionsToUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AttachPermissionsToUserController extends ApiController
{
    /**
     * @param AttachPermissionsToUserRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UnknownProperties
     */
    public function attachPermissionsToUser(AttachPermissionsToUserRequest $request): array
    {
        $dto = new AttachPermissionsToUserDto($request->validated());
        $user = app(AttachPermissionsToUserAction::class)->run($dto);

        return $this->transform($user, UserTransformer::class, ['permissions']);
    }

}
