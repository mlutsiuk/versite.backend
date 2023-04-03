<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use App\Containers\AppSection\Assignment\Data\Dto\UpdateAssignmentDto;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAssignmentTask extends ParentTask
{
    public function __construct(
        protected AssignmentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateAssignmentDto $dto, $id): Assignment
    {
        try {
            return $this->repository->update([
                'title' => $dto->title,
                'description' => $dto->description,
                'max_mark' => $dto->max_mark,
                'deadline' => $dto->deadline,
             ], $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
