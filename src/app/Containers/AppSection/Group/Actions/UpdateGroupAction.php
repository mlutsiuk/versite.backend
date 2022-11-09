<?php

namespace App\Containers\AppSection\Group\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Group\Tasks\UpdateGroupTask;
use App\Containers\AppSection\Group\Data\Dto\UpdateGroupDto;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateGroupAction extends ParentAction
{
    /**
     * @param UpdateGroupDto $dto
     * @param $id
     * @return Group
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateGroupDto $dto, $id): Group
    {
        return app(UpdateGroupTask::class)->run($dto, $id);
    }
}
