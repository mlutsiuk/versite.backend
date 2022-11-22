<?php

namespace App\Containers\AppSection\Achievement\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Achievement\Tasks\GetAllCourseAchievementsTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseAchievementsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        return app(GetAllCourseAchievementsTask::class)->run($courseId);
    }
}
