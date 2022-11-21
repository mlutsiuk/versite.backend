<?php

namespace App\Containers\AppSection\Achievement\Tasks;

use App\Containers\AppSection\Achievement\Data\Dto\UpdateCourseAchievementDto;
use App\Containers\AppSection\Achievement\Data\Repositories\CourseAchievementRepository;
use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCourseAchievementTask extends ParentTask
{
    public function __construct(
        protected CourseAchievementRepository $repository
    ) {
    }

    /**
     * @param UpdateCourseAchievementDto $dto
     * @param $id
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateCourseAchievementDto $dto, $id): CourseAchievement
    {
        try {
            return $this->repository->update([
                'course_id' => $dto->course_id,
                'title' => $dto->title,
                'description' => $dto->description,
                'title_color' => $dto->title_color,
                'description_color' => $dto->description_color,
                'border_color' => $dto->border_color
             ], $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
