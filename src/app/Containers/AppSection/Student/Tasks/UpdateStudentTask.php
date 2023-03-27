<?php

namespace App\Containers\AppSection\Student\Tasks;

use App\Containers\AppSection\Student\Data\Dto\UpdateStudentDto;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateStudentTask extends ParentTask
{
    public function __construct(
        protected StudentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateStudentDto $dto, $id): Student
    {
        try {
            return $this->repository->create([
                'name' => $dto->name
            ]);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
