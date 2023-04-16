<?php

namespace App\Containers\AppSection\Course\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Course\Data\Repositories\CourseRepository;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Auth;
use Prettus\Repository\Exceptions\RepositoryException;

class GetParticipatedCoursesTask extends ParentTask
{
    public function __construct(
        protected CourseRepository $repository,
        protected StudentRepository $studentRepository
    ) {}

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $students = $this->studentRepository->findWhere(['user_id' => Auth::id()])->pluck('id')->toArray();

        return $this->repository->whereHas('students', function ($query) use ($students) {
            $query->whereIn('id', $students);
        })->paginate();
    }
}
