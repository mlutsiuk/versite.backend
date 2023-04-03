<?php

namespace App\Containers\AppSection\Assignment\Actions;

use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Assignment\Tasks\FindAssignmentByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindAssignmentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): Assignment
    {
        return app(FindAssignmentByIdTask::class)->run($id);
    }
}
