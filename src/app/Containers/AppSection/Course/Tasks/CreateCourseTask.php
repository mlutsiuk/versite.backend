<?php

namespace App\Containers\AppSection\Course\Tasks;

use App\Containers\AppSection\Course\Data\Dto\CreateCourseDto;
use App\Containers\AppSection\Course\Data\Repositories\CourseRepository;
use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Auth;
use Exception;

class CreateCourseTask extends ParentTask
{
    public function __construct(
        protected CourseRepository $repository
    ) {
    }

    /**
     * @param CreateCourseDto $dto
     * @return Course
     * @throws CreateResourceFailedException
     */
    public function run(CreateCourseDto $dto): Course
    {
        try {
            $course = $this->repository->create([
                'slug' => $dto->slug,
                'title' => $dto->title,
                'description' => $dto->description,
                'author_id' => Auth::id()
            ]);

            return $course;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
