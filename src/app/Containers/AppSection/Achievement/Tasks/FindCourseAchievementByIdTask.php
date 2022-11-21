<?php

namespace App\Containers\AppSection\Achievement\Tasks;

use App\Containers\AppSection\Achievement\Data\Repositories\CourseAchievementRepository;
use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCourseAchievementByIdTask extends ParentTask
{
    public function __construct(
        protected CourseAchievementRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): CourseAchievement
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
