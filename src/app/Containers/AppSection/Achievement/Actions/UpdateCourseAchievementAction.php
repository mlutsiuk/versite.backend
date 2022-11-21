<?php

namespace App\Containers\AppSection\Achievement\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Containers\AppSection\Achievement\Tasks\UpdateCourseAchievementTask;
use App\Containers\AppSection\Achievement\Data\Dto\UpdateCourseAchievementDto;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCourseAchievementAction extends ParentAction
{
    /**
     * @param UpdateCourseAchievementDto $dto
     * @param $id
     * @return CourseAchievement
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCourseAchievementDto $dto, $id): CourseAchievement
    {
        return app(UpdateCourseAchievementTask::class)->run($dto, $id);
    }
}
