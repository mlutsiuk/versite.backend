<?php

namespace App\Containers\AppSection\Course\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Course\Data\Dto\CreateCourseDto;
use App\Containers\AppSection\Course\Models\Course;
use App\Containers\AppSection\Course\Tasks\CreateCourseTask;
use App\Containers\AppSection\Course\UI\API\Requests\CreateCourseRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCourseAction extends ParentAction
{
    /**
     * @param CreateCourseDto $dto
     * @return Course
     * @throws CreateResourceFailedException
     */
    public function run(CreateCourseDto $dto): Course    // TODO: Dto
    {
        return app(CreateCourseTask::class)->run($dto);
    }
}
