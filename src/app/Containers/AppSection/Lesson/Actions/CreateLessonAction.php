<?php

namespace App\Containers\AppSection\Lesson\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Course\Data\Repositories\CourseRepository;
use App\Containers\AppSection\Course\Models\Course;
use App\Containers\AppSection\Group\Data\Repositories\GroupRepository;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Lesson\Tasks\CreateLessonTask;
use App\Containers\AppSection\Lesson\Data\Dto\CreateLessonDto;
use App\Containers\AppSection\LessonMaterial\Data\Dto\CreateLessonMaterialDto;
use App\Containers\AppSection\LessonMaterial\Tasks\CreateLessonMaterialTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateLessonAction extends ParentAction
{
    /**
     * @param CreateLessonDto $dto
     * @return Lesson
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateLessonDto $dto): Lesson
    {
        /** @var Course $course */
        $course = app(GroupRepository::class)->with('course')->find($dto->course_id);
        $courseId = $course->id;

        $materialDto = new CreateLessonMaterialDto([
            'content' => '...',
            'course_id' => $courseId
        ]);

        $lessonMaterial = app(CreateLessonMaterialTask::class)->run($materialDto);

        return app(CreateLessonTask::class)->run($dto, $lessonMaterial->id);
    }
}
