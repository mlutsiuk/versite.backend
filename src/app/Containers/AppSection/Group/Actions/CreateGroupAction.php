<?php

namespace App\Containers\AppSection\Group\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Group\Tasks\CreateGroupTask;
use App\Containers\AppSection\Group\Data\Dto\CreateGroupDto;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateGroupAction extends ParentAction
{
    /**
     * @param CreateGroupDto $dto
     * @return Group
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateGroupDto $dto): Group
    {
        return app(CreateGroupTask::class)->run($dto);
    }
}
