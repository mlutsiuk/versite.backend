<?php

namespace App\Containers\AppSection\Course\Actions;

use App\Containers\AppSection\Course\Models\Course;
use App\Containers\AppSection\Course\Tasks\FindCourseByIdTask;
use App\Containers\AppSection\Course\UI\API\Requests\FindCourseByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCourseByIdAction extends ParentAction
{
    /**
     * @param $courseId
     * @return Course
     * @throws NotFoundException
     */
    public function run($courseId): Course
    {
        return app(FindCourseByIdTask::class)->run($courseId);
    }
}
