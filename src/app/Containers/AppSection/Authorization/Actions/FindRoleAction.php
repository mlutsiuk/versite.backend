<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\Authorization\UI\API\Requests\FindRoleRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindRoleAction extends ParentAction
{
    /**
     * @param string|int $id Role hashKey
     * @return Role
     * @throws NotFoundException
     */
    public function run(string|int $id): Role
    {
        return app(FindRoleTask::class)->run($id);
    }
}
