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
     * @throws CreateResourceFailedException
     */
    public function run(CreateLessonDto $dto): Lesson
    {
        try {
            return $this->repository->create([
                'title' => $dto->title,
                'course_id' => $dto->course_id,
                'date' => $dto->date
            ]);

        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
