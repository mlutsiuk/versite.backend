<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Models\Permission;
use App\Containers\AppSection\Authorization\Tasks\FindPermissionTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindPermissionAction extends ParentAction
{
    /**
     * @param string|int $id Permission hashKey
     * @return Permission
     * @throws NotFoundException
     */
    public function run(string|int $id): Permission
    {
        return app(FindPermissionTask::class)->run($id);
    }
}
