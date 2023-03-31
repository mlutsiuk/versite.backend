<?php

namespace App\Containers\AppSection\Student\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Ship\Criterias\WhereColumnEquals;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseStudentsTask extends ParentTask
{
    public function __construct(
        protected StudentRepository $repository
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
