<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\FindStudentByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindStudentByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): Student
    {
        return app(FindStudentByIdTask::class)->run($id);
    }
}
