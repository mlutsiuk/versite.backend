<?php

namespace App\Containers\AppSection\Lesson\Actions;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Lesson\Tasks\CreateLessonTask;
use App\Containers\AppSection\Lesson\Data\Dto\CreateLessonDto;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateLessonAction extends ParentAction
{
    /**
     * @param CreateLessonDto $dto
     * @return Lesson
     * @throws CreateResourceFailedException
     */
    public function run(CreateLessonDto $dto): Lesson
    {
        return app(CreateLessonTask::class)->run($dto);
    }
}
