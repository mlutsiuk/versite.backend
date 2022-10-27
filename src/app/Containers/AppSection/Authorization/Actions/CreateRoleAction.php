<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Data\Dto\CreateRoleDto;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateRoleAction extends ParentAction
{
    /**
     * @param CreateRoleDto $dto
     * @return Role
     *
     * @throws CreateResourceFailedException
     */
    public function run(CreateRoleDto $dto): Role
    {
        return app(CreateRoleTask::class)->run($dto->name, $dto->description, $dto->display_name);
    }
}
