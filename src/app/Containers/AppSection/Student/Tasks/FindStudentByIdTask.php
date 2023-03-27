<?php

namespace App\Containers\AppSection\Student\Tasks;

use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindStudentByIdTask extends ParentTask
{
    public function __construct(
        protected StudentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Student
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
