<?php

namespace App\Containers\AppSection\Lesson\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Lesson\Tasks\GetAllCourseLessonsTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseLessonsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        return app(GetAllCourseLessonsTask::class)->run($courseId);
    }
}
