<?php

namespace App\Containers\AppSection\Achievement\Actions;

use App\Containers\AppSection\Achievement\Tasks\DeleteCourseAchievementTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteCourseAchievementAction extends ParentAction
{
    /**
     * @param $id
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        return app(DeleteCourseAchievementTask::class)->run($id);
    }
}
