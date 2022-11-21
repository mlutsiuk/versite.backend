<?php

namespace App\Containers\AppSection\Achievement\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Containers\AppSection\Achievement\Tasks\CreateCourseAchievementTask;
use App\Containers\AppSection\Achievement\Data\Dto\CreateCourseAchievementDto;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCourseAchievementAction extends ParentAction
{
    /**
     * @param CreateCourseAchievementDto $dto
     * @return CourseAchievement
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCourseAchievementDto $dto, $courseId): CourseAchievement
    {
        return app(CreateCourseAchievementTask::class)->run($dto, $courseId);
    }
}
