<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Ship\Criterias\WhereColumnEquals;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllLessonAssignmentsTask extends ParentTask
{
    public function __construct(
        protected AssignmentRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($lessonId): mixed
    {
        return $this->addRequestCriteria()
            ->repository
            ->pushCriteria(new WhereColumnEquals('lesson_id', $lessonId))
            ->paginate();
    }
}
