<?php

namespace App\Containers\AppSection\Assignment\Actions;

use App\Containers\AppSection\Assignment\Tasks\DeleteAssignmentTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteAssignmentAction extends ParentAction
{
    /**
     * @param $id
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        return app(DeleteAssignmentTask::class)->run($id);
    }
}
