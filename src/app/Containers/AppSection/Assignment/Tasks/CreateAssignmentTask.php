<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use App\Containers\AppSection\Assignment\Data\Dto\CreateAssignmentDto;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateAssignmentTask extends ParentTask
{
    public function __construct(
        protected AssignmentRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(CreateAssignmentDto $dto): Assignment
    {
        try {

            return $this->repository->create([
                'title' => $dto->title,
                'description' => $dto->description,
                'max_mark' => $dto->max_mark,
                'deadline' => $dto->deadline,
                'lesson_id' => $dto->lesson_id
            ]);

        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
