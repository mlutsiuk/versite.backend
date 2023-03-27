<?php

namespace App\Containers\AppSection\Student\Tasks;

use App\Containers\AppSection\Student\Data\Dto\CreateStudentDto;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateStudentTask extends ParentTask
{
    public function __construct(
        protected StudentRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(CreateStudentDto $dto): Student
    {
        try {
            return $this->repository->create([
                'name' => $dto->name,
                'user_id' => $dto->user_id,
                'course_id' => $dto->course_id,
            ]);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
