<?php

namespace App\Containers\AppSection\Course\Actions;

use App\Containers\AppSection\Course\Data\Dto\UpdateCourseDto;
use App\Containers\AppSection\Course\Models\Course;
use App\Containers\AppSection\Course\Tasks\UpdateCourseTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCourseAction extends ParentAction
{
    /**
     * @param UpdateCourseDto $dto
     * @param $courseId
     * @return Course
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateCourseDto $dto, $courseId): Course
    {
        return app(UpdateCourseTask::class)->run($dto, $courseId);
    }
}
