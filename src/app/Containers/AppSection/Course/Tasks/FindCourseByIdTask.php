<?php

namespace App\Containers\AppSection\Course\Tasks;

use App\Containers\AppSection\Course\Data\Repositories\CourseRepository;
use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCourseByIdTask extends ParentTask
{
    public function __construct(
        protected CourseRepository $repository
    ) {
    }

    /**
     * @param $id
     * @return Course
     * @throws NotFoundException
     */
    public function run($id): Course
    {
        try {
            $course = $this->repository->find($id);

            return $course;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
