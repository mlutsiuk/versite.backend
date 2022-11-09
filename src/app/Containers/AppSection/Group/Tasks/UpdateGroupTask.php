<?php

namespace App\Containers\AppSection\Group\Tasks;

use App\Containers\AppSection\Group\Data\Dto\UpdateGroupDto;
use App\Containers\AppSection\Group\Data\Repositories\GroupRepository;
use App\Containers\AppSection\Group\Models\Group;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateGroupTask extends ParentTask
{
    public function __construct(
        protected GroupRepository $repository
    ) {
    }

    /**
     * @param UpdateGroupDto $dto
     * @param $id
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateGroupDto $dto, $id): Group
    {
        try {
            return $this->repository->update([
                'title' => $dto->title,
                'is_private' => $dto->is_private,
                'registration_start' => $dto->registration_start,
                'registration_end' => $dto->registration_end
            ], $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
