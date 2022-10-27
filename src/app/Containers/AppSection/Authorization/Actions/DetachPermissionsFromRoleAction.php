<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Data\Dto\DetachPermissionsToRoleDto;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\DetachPermissionsFromRoleTask;
use App\Containers\AppSection\Authorization\Tasks\FindPermissionTask;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DetachPermissionsFromRoleAction extends ParentAction
{
    /**
     * @param DetachPermissionsToRoleDto $dto
     * @return Role
     * @throws NotFoundException
     */
    public function run(DetachPermissionsToRoleDto $dto): Role
    {
        $role = app(FindRoleTask::class)->run($dto->role_id);

        $permissions = array_map(static function ($permissionId) {
            return app(FindPermissionTask::class)->run($permissionId);
        }, $dto->permissions_ids);

        return app(DetachPermissionsFromRoleTask::class)->run($role, $permissions);
    }
}
