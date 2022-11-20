<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use App\Containers\AppSection\Lesson\Data\Dto\UpdateLessonDto;
use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateLessonTask extends ParentTask
{
    public function __construct(
        protected LessonRepository $repository
    ) {
    }

    /**
     * @param UpdateLessonDto $dto
     * @param $id
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateLessonDto $dto, $id): Lesson
    {
        try {
            return $this->repository->update([
                'title' => $dto->title,
                'group_id' => $dto->group_id,
                'open_at' => $dto->open_at
             ], $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
