<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Lesson\Models\LessonMaterial;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindLessonMaterialByIdTask extends ParentTask
{
    public function __construct(
        protected LessonRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($lessonId): LessonMaterial
    {
        try {
            /** @var Lesson $lesson */
            $lesson = $this->repository->find($lessonId);

            return $lesson->material;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
