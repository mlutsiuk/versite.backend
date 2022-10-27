<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authorization\Actions\SyncUserRolesAction;
use App\Containers\AppSection\Authorization\Data\Dto\SyncUserRolesDto;
use App\Containers\AppSection\Authorization\UI\API\Requests\SyncUserRolesRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SyncUserRolesController extends ApiController
{
    /**
     * @param SyncUserRolesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UnknownProperties
     */
    public function syncUserRoles(SyncUserRolesRequest $request): array
    {
        $dto = new SyncUserRolesDto($request->validated());
        $user = app(SyncUserRolesAction::class)->run($dto);

        return $this->transform($user, UserTransformer::class, ['roles']);
    }
}
