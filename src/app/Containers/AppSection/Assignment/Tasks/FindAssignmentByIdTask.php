<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindAssignmentByIdTask extends ParentTask
{
    public function __construct(
        protected AssignmentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Assignment
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
