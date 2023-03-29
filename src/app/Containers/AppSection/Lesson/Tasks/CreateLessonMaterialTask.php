<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use App\Containers\AppSection\Lesson\Data\Dto\CreateLessonMaterialDto;
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
    public function run(CreateLessonMaterialDto $dto): LessonMaterial
    {
        try {

            return $this->repository->create([
                'content' => $dto->content,
                'course_id' => $dto->course_id
            ]);

        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
