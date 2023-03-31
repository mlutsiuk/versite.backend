<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use App\Containers\AppSection\Lesson\Data\Repositories\LessonMaterialRepository;
use App\Containers\AppSection\Lesson\Models\LessonMaterial;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindLessonMaterialByIdTask extends ParentTask
{
    public function __construct(
        protected LessonMaterialRepository $repository
    ) {}

    /**
     * @throws NotFoundException
     */
    public function run($lessonId): LessonMaterial
    {
        try {
            /** @var LessonMaterial $material */
            $material = $this->repository->findWhere([
                'lesson_id' => $lessonId
            ])->first();

            if(empty($material)) {
                throw new NotFoundException();
            }

            return $material;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
