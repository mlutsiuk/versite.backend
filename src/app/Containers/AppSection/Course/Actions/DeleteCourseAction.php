<?php

namespace App\Containers\AppSection\Course\Actions;

use App\Containers\AppSection\Course\Tasks\DeleteCourseTask;
use App\Containers\AppSection\Course\UI\API\Requests\DeleteCourseRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCourseAction extends ParentAction
{
    /**
     * @param $courseId
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($courseId): int
    {
        return app(DeleteCourseTask::class)->run($courseId);
    }
}
