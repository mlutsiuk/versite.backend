<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authorization\Actions\AttachPermissionsToRoleAction;
use App\Containers\AppSection\Authorization\Data\Dto\AttachPermissionsToRolesDto;
use App\Containers\AppSection\Authorization\UI\API\Requests\AttachPermissionsToRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AttachPermissionsToRoleController extends ApiController
{
    /**
     * @param AttachPermissionsToRoleRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UnknownProperties
     */
    public function attachPermissionsToRole(AttachPermissionsToRoleRequest $request): array
    {
        $dto = new AttachPermissionsToRolesDto($request->validated());
        $role = app(AttachPermissionsToRoleAction::class)->run($dto);

        return $this->transform($role, RoleTransformer::class);
    }
}
