<?php

namespace App\Containers\AppSection\LessonMaterial\Actions;

use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
use App\Containers\AppSection\LessonMaterial\Tasks\FindLessonMaterialByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindLessonMaterialByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($lessonId): LessonMaterial
    {
        return app(FindLessonMaterialByIdTask::class)->run($lessonId);
    }
}
