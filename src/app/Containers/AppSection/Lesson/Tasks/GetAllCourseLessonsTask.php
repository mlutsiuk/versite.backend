<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Ship\Criterias\WhereColumnEquals;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseLessonsTask extends ParentTask
{
    public function __construct(
        protected LessonRepository $repository
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        return $this->addRequestCriteria()
            ->repository
            ->pushCriteria(new WhereColumnEquals('course_id', $courseId))
            ->paginate();
    }
}
