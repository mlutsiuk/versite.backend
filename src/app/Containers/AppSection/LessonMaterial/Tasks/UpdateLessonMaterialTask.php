<?php

namespace App\Containers\AppSection\LessonMaterial\Tasks;

use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\LessonMaterial\Data\Dto\UpdateLessonMaterialDto;
use App\Containers\AppSection\LessonMaterial\Data\Repositories\LessonMaterialRepository;
use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
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
     * @param UpdateLessonMaterialDto $dto
     * @param $lessonId
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
             ], $lesson->material_id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
