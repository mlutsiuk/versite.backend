<?php

namespace App\Containers\AppSection\LessonMaterial\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
use App\Containers\AppSection\LessonMaterial\Tasks\UpdateLessonMaterialTask;
use App\Containers\AppSection\LessonMaterial\Data\Dto\UpdateLessonMaterialDto;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateLessonMaterialAction extends ParentAction
{
    /**
     * @param UpdateLessonMaterialDto $dto
     * @param $lessonId
     * @return LessonMaterial
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateLessonMaterialDto $dto, $lessonId): LessonMaterial
    {
        return app(UpdateLessonMaterialTask::class)->run($dto, $lessonId);
    }
}
