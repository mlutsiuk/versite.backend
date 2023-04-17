<?php

namespace App\Containers\AppSection\Lesson\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Course\Criterias\WhereUserIsAuthorOrStudent;
use App\Containers\AppSection\Course\Data\Repositories\CourseRepository;
use App\Containers\AppSection\Lesson\Criterias\WhereCourseOneOf;
use App\Containers\AppSection\Lesson\Criterias\WhereDateBetween;
use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Auth;
use Prettus\Repository\Exceptions\RepositoryException;

class CalendarLessonsTask extends ParentTask
{
    public function __construct(
        protected LessonRepository $repository,
        protected CourseRepository $courseRepository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(string $from, string $to): mixed
    {
        /** @var array<int> $userCourses Array of id of courses, where current user is author or student */
        $userCourses = $this->courseRepository
            ->pushCriteria(new WhereUserIsAuthorOrStudent(Auth::id()))
            ->pluck('id')->toArray();

        return $this->addRequestCriteria()
            ->repository
            ->pushCriteria(new WhereCourseOneOf($userCourses))
            ->pushCriteria(new WhereDateBetween($from, $to))
            ->paginate();
    }
}
