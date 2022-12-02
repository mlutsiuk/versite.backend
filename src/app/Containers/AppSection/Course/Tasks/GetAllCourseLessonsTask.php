<?php

namespace App\Containers\AppSection\Course\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Group\Data\Repositories\GroupRepository;
use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Lesson\Data\Repositories\LessonRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseLessonsTask extends ParentTask
{
    public function __construct(
        protected LessonRepository $lessonRepository,
        protected GroupRepository $groupRepository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($courseId): mixed
    {
        /** @var Group $group */
        $group = $this->groupRepository->whereHas('course', function (Builder $query) use ($courseId) {
            $query->where('courses.id', '=', $courseId);
        })->first();

        return $this->addRequestCriteria($this->lessonRepository)->lessonRepository->whereHas('group', function (Builder $query) use ($group) {
            $query->where('groups.id', '=', $group->id);
        })->paginate();
    }
}
