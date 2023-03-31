<?php

namespace App\Containers\AppSection\Course\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Course\Criterias\WhereCourseAuthorCriteria;
use App\Containers\AppSection\Course\Data\Repositories\CourseRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Auth;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAuthoredCoursesTask extends ParentTask
{
    public function __construct(
        protected CourseRepository $repository
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository
            ->pushCriteria(new WhereCourseAuthorCriteria(Auth::id()))
            ->paginate();
    }
}
