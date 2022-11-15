<?php

namespace App\Containers\AppSection\Lesson\Actions;

use App\Containers\AppSection\Lesson\Tasks\DeleteLessonTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteLessonAction extends ParentAction
{
    /**
     * @param $id
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        return app(DeleteLessonTask::class)->run($id);
    }
}
