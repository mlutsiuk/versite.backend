<?php

namespace App\Containers\AppSection\Course\Tasks;

use App\Containers\AppSection\Course\Data\Dto\UpdateCourseDto;
use App\Containers\AppSection\Course\Data\Repositories\CourseRepository;
use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCourseTask extends ParentTask
{
    public function __construct(
        protected CourseRepository $repository
    ) {
    }

    /**
     * @param UpdateCourseDto $dto
     * @param $id
     * @return Course
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateCourseDto $dto, $id): Course
    {
        try {
            $course = $this->repository->update([
                'slug' => $dto->slug,
                'title' => $dto->title,
                'description' => $dto->description
            ], $id);

            return $course;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
