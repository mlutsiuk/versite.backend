<?php

namespace App\Containers\AppSection\LessonMaterial\Tasks;

use App\Containers\AppSection\LessonMaterial\Data\Dto\CreateLessonMaterialDto;
use App\Containers\AppSection\LessonMaterial\Data\Repositories\LessonMaterialRepository;
use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateLessonMaterialTask extends ParentTask
{
    public function __construct(
        protected LessonMaterialRepository $repository
    ) {
    }

    /**
     * @param CreateLessonMaterialDto $dto
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
