<?php

namespace App\Containers\AppSection\Lesson\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Lesson\Tasks\UpdateLessonTask;
use App\Containers\AppSection\Lesson\Data\Dto\UpdateLessonDto;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateLessonAction extends ParentAction
{
    /**
     * @param UpdateLessonDto $dto
     * @param $id
     * @return Lesson
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateLessonDto $dto, $id): Lesson
    {
        return app(UpdateLessonTask::class)->run($dto, $id);
    }
}
