<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use App\Containers\AppSection\Lesson\Data\Repositories\LessonMaterialRepository;
use App\Containers\AppSection\Lesson\Models\LessonMaterial;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateLessonMaterialTask extends ParentTask
{
    public function __construct(
        protected LessonMaterialRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(int $lessonId): LessonMaterial
    {
        try {

            return $this->repository->create([
                'content' => '',
                'lesson_id' => $lessonId
            ]);

        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
