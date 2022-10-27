<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Data\Dto\SyncUserRolesDto;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class SyncUserRolesAction extends ParentAction
{
    /**
     * @param SyncUserRolesDto $dto
     * @return User
     * @throws NotFoundException
     */
    public function run(SyncUserRolesDto $dto): User
    {
        $user = app(FindUserByIdTask::class)->run($dto->user_id);

        $rolesIds = $dto->roles_ids;

        $roles = array_map(static function ($roleId) {
            return app(FindRoleTask::class)->run($roleId);
        }, $rolesIds);

        $user->syncRoles($roles);

        return $user;
    }
}
