<?php

namespace App\Containers\AppSection\Lesson\Actions;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Lesson\Tasks\FindLessonByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindLessonByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): Lesson
    {
        return app(FindLessonByIdTask::class)->run($id);
    }
}
