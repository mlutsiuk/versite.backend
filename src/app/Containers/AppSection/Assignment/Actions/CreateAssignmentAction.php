<?php

namespace App\Containers\AppSection\Assignment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Assignment\Data\Dto\CreateAssignmentDto;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Assignment\Tasks\CreateAssignmentTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateAssignmentAction extends ParentAction
{
    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateAssignmentDto $dto): Assignment
    {
        return app(CreateAssignmentTask::class)->run($dto);
    }
}
