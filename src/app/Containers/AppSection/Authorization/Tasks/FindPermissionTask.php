<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\PermissionRepository;
use App\Containers\AppSection\Authorization\Models\Permission;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindPermissionTask extends ParentTask
{
    public function __construct(
        protected PermissionRepository $repository
    ) {
    }

    /**
     * @param string|int $id Permission hashKey
     * @param string $guardName
     * @return Permission
     * @throws NotFoundException
     */
    public function run(string|int $id, string $guardName = 'api'): Permission
    {
        $query = [
            'guard_name' => $guardName,
            'id' => $id
        ];

        $permission = $this->repository->findWhere($query)->first();

        return $permission ?? throw new NotFoundException();
    }
}
