<?php

namespace App\Containers\AppSection\Assignment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Assignment\Tasks\GetAllCourseAssignmentsTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseAssignmentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        return app(GetAllCourseAssignmentsTask::class)->run($courseId);
    }
}
