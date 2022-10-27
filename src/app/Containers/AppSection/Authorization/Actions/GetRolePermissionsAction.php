<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\Authorization\UI\API\Requests\GetRolePermissionsRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetRolePermissionsAction extends ParentAction
{
    /**
     * @param string|int $id Role hashKey
     * @return mixed
     * @throws NotFoundException
     */
    public function run(string|int $id): mixed
    {
        $role = app(FindRoleTask::class)->run($id);

        return $role->permissions;
    }
}
