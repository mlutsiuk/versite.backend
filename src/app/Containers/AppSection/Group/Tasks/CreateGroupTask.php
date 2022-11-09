<?php

namespace App\Containers\AppSection\Group\Tasks;

use App\Containers\AppSection\Group\Data\Dto\CreateGroupDto;
use App\Containers\AppSection\Group\Data\Repositories\GroupRepository;
use App\Containers\AppSection\Group\Models\Group;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateGroupTask extends ParentTask
{
    public function __construct(
        protected GroupRepository $repository
    ) {
    }

    /**
     * @param CreateGroupDto $dto
     * @throws CreateResourceFailedException
     */
    public function run(CreateGroupDto $dto): Group
    {
        try {
            return $this->repository->create([
                 'title' => $dto->title,
                 'course_id' => $dto->course_id,
                 'is_private' => $dto->is_private,
                 'registration_start' => $dto->registration_start,
                 'registration_end' => $dto->registration_end
            ]);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
