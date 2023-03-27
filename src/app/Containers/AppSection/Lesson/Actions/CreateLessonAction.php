<?php

namespace App\Containers\AppSection\Lesson\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Course\Models\Course;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Lesson\Tasks\CreateLessonTask;
use App\Containers\AppSection\Lesson\Data\Dto\CreateLessonDto;
use App\Containers\AppSection\LessonMaterial\Data\Dto\CreateLessonMaterialDto;
use App\Containers\AppSection\LessonMaterial\Tasks\CreateLessonMaterialTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateLessonAction extends ParentAction
{
    /**
     * @param CreateLessonDto $dto
     * @return Lesson
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateLessonDto $dto): Lesson
    {
        return app(CreateLessonTask::class)->run($dto);
    }
}
