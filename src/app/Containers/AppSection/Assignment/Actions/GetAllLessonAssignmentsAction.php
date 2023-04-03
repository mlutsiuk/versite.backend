<?php

namespace App\Containers\AppSection\Assignment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Assignment\Tasks\GetAllLessonAssignmentsTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllLessonAssignmentsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($lessonId): mixed
    {
        return app(GetAllLessonAssignmentsTask::class)->run($lessonId);
    }
}
