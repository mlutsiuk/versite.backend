<?php

namespace App\Containers\AppSection\Course\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Course\Tasks\GetAllCoursesTask;
use App\Containers\AppSection\Course\UI\API\Requests\GetAllCoursesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCoursesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return app(GetAllCoursesTask::class)->run();
    }
}
