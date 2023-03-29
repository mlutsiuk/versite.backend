<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Lesson\Data\Dto\UpdateLessonMaterialDto;
use App\Containers\AppSection\Lesson\Data\Repositories\LessonMaterialRepository;
use App\Containers\AppSection\Lesson\Models\LessonMaterial;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateLessonMaterialTask extends ParentTask
{
    public function __construct(
        protected LessonMaterialRepository $lessonMaterialRepository,
        protected LessonRepository $lessonRepository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateLessonMaterialDto $dto, $lessonId): LessonMaterial
    {
        try {
            /** @var Lesson $lesson */
            $lesson = $this->lessonRepository->find($lessonId);

            return $this->lessonMaterialRepository->update([
                'content' => $dto->content
             ], $lesson->material_id);    //TODO: Fix
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
