<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Data\Dto\AttachPermissionsToRolesDto;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\FindPermissionTask;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class AttachPermissionsToRoleAction extends ParentAction
{
    /**
     * @param AttachPermissionsToRolesDto $dto
     * @return Role
     * @throws NotFoundException
     */
    public function run(AttachPermissionsToRolesDto $dto): Role
    {
        $role = app(FindRoleTask::class)->run($dto->role_id);

        $permissionIds = $dto->permissions_ids;

        $permissions = array_map(static function ($permissionId) {
            return app(FindPermissionTask::class)->run($permissionId);
        }, $permissionIds);

        return $role->givePermissionTo($permissions);
    }
}
