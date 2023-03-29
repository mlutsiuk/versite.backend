<?php

namespace App\Containers\AppSection\Lesson\Actions;

use App\Containers\AppSection\Lesson\Models\LessonMaterial;
use App\Containers\AppSection\Lesson\Tasks\FindLessonMaterialByIdTask;
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
