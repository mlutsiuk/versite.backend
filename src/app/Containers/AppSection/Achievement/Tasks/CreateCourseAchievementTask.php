<?php

namespace App\Containers\AppSection\Achievement\Tasks;

use App\Containers\AppSection\Achievement\Data\Dto\CreateCourseAchievementDto;
use App\Containers\AppSection\Achievement\Data\Repositories\CourseAchievementRepository;
use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCourseAchievementTask extends ParentTask
{
    public function __construct(
        protected CourseAchievementRepository $repository
    ) {
    }

    /**
     * @param CreateCourseAchievementDto $dto
     * @throws CreateResourceFailedException
     */
    public function run(CreateCourseAchievementDto $dto, $courseId): CourseAchievement
    {
        try {
            return $this->repository->create([
                'course_id' => $courseId,
                'title' => $dto->title,
                'description' => $dto->description,
                'title_color' => $dto->title_color,
                'description_color' => $dto->description_color,
                'border_color' => $dto->border_color
            ]);

        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
