<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\UI\API\Requests\GetUserRolesRequest;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetUserRolesAction extends ParentAction
{
    /**
     * @param string|int $id
     * @return mixed
     * @throws NotFoundException
     */
    public function run(string|int $id): mixed
    {
        $user = app(FindUserByIdTask::class)->run($id);

        return $user->roles;
    }
}
