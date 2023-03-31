<?php

namespace App\Containers\AppSection\Lesson\Tasks;

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
        protected LessonMaterialRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateLessonMaterialDto $dto, $lessonId): LessonMaterial
    {
        try {
            /** @var LessonMaterial $material */
            $material = $this->repository->findWhere([
                'lesson_id' => $lessonId
            ])->first();

            if(empty($material)) {
                throw new ModelNotFoundException();
            }

            return $this->repository->update([
                'content' => $dto->content
             ], $material->id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
