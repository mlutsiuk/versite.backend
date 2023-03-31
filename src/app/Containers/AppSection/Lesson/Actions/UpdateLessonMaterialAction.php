<?php

namespace App\Containers\AppSection\Lesson\Actions;

use App\Containers\AppSection\Lesson\Data\Dto\UpdateLessonMaterialDto;
use App\Containers\AppSection\Lesson\Models\LessonMaterial;
use App\Containers\AppSection\Lesson\Tasks\UpdateLessonMaterialTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateLessonMaterialAction extends ParentAction
{
    /**
     * @return LessonMaterial
     * @throws UpdateResourceFailedException
     * @throws NotFoundException
     */
    public function run(UpdateLessonMaterialDto $dto, $lessonId): LessonMaterial
    {
        return app(UpdateLessonMaterialTask::class)->run($dto, $lessonId);
    }
}
