<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindRoleTask extends ParentTask
{
    public function __construct(
        protected RoleRepository $repository
    ) {
    }

    /**
     * @param string|int $id
     * @param string $guardName
     * @return Role
     * @throws NotFoundException
     */
    public function run(string|int $id, string $guardName = 'api'): Role
    {
        $query = [
            'guard_name' => $guardName,
            'id' => $id
        ];

        $role = $this->repository->findWhere($query)->first();

        return $role ?? throw new NotFoundException();
    }
}
