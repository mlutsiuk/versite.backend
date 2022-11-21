<?php

namespace App\Containers\AppSection\Achievement\Actions;

use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Containers\AppSection\Achievement\Tasks\FindCourseAchievementByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCourseAchievementByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): CourseAchievement
    {
        return app(FindCourseAchievementByIdTask::class)->run($id);
    }
}
