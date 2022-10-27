<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authorization\Actions\AssignRolesToUserAction;
use App\Containers\AppSection\Authorization\Data\Dto\AssignRolesToUserDto;
use App\Containers\AppSection\Authorization\UI\API\Requests\AssignRolesToUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AssignRolesToUserController extends ApiController
{
    /**
     * @param AssignRolesToUserRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UnknownProperties
     */
    public function assignRolesToUser(AssignRolesToUserRequest $request): array
    {
        $dto = new AssignRolesToUserDto($request->validated());
        $user = app(AssignRolesToUserAction::class)->run($dto);

        return $this->transform($user, UserTransformer::class);
    }
}
