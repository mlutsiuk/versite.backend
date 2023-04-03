<?php

namespace App\Containers\AppSection\Assignment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Assignment\Data\Dto\UpdateAssignmentDto;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Assignment\Tasks\UpdateAssignmentTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateAssignmentAction extends ParentAction
{
    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateAssignmentDto $dto, $id): Assignment
    {
        return app(UpdateAssignmentTask::class)->run($dto, $id);
    }
}
