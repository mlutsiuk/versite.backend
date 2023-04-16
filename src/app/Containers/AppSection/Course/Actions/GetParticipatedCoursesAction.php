<?php

namespace App\Containers\AppSection\Course\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Course\Tasks\GetParticipatedCoursesTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetParticipatedCoursesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return app(GetParticipatedCoursesTask::class)->run();
    }
}
