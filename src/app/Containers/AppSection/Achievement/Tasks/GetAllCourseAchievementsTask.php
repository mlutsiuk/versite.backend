<?php

namespace App\Containers\AppSection\Achievement\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Achievement\Criterias\WhereCourseCriteria;
use App\Containers\AppSection\Achievement\Data\Repositories\CourseAchievementRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseAchievementsTask extends ParentTask
{
    public function __construct(
        protected CourseAchievementRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        return $this->addRequestCriteria()
            ->repository
            ->pushCriteria(new WhereCourseCriteria($courseId))
            ->paginate();
    }
}
