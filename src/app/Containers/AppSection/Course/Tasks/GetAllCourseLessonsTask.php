<?php

namespace App\Containers\AppSection\Course\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseLessonsTask extends ParentTask
{
    public function __construct(
        protected LessonRepository $lessonRepository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        // TODO
        return $this->addRequestCriteria($this->lessonRepository)->lessonRepository->whereHas('course', function (Builder $query) use ($courseId) {
            $query->where('courses.id', '=', $courseId);
        })->paginate();
    }
}
