<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use App\Containers\AppSection\Lesson\Data\Dto\CreateLessonDto;
use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateLessonTask extends ParentTask
{
    public function __construct(
        protected LessonRepository $repository
    ) {
    }

    /**
     * @param CreateLessonDto $dto
     * @throws CreateResourceFailedException
     */
    public function run(CreateLessonDto $dto): Lesson
    {
        try {
            return $this->repository->create([
                'title' => $dto->title,
                'group_id' => $dto->group_id,
//                'material_id' => $dto->material_id,
                'open_at' => $dto->open_at
            ]);

        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
