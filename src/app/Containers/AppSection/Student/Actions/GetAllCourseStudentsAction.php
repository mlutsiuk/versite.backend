<?php

namespace App\Containers\AppSection\Student\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Student\Tasks\GetAllCourseStudentsTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseStudentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        return app(GetAllCourseStudentsTask::class)->run($courseId);
    }
}
