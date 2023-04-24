<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Assignment\Criterias\WhereAssignmentCourseCriteria;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseAssignmentsTask extends ParentTask
{
    public function __construct(
        protected AssignmentRepository $repository
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
            ->pushCriteria(new WhereAssignmentCourseCriteria($courseId))
            ->paginate();
    }
}
