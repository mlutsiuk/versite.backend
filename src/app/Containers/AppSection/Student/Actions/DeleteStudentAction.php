<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Tasks\DeleteStudentTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteStudentAction extends ParentAction
{
    /**
     * @param $id
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        return app(DeleteStudentTask::class)->run($id);
    }
}
