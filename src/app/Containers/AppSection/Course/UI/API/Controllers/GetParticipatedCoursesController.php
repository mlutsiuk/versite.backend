<?php

namespace App\Containers\AppSection\Course\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Course\Actions\GetParticipatedCoursesAction;
use App\Containers\AppSection\Course\UI\API\Requests\GetParticipatedCoursesRequest;
use App\Containers\AppSection\Course\UI\API\Transformers\CourseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetParticipatedCoursesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getParticipatedCourses(GetParticipatedCoursesRequest $request): array
    {
        $courses = app(GetParticipatedCoursesAction::class)->run();

        return $this->transform($courses, CourseTransformer::class);
    }
}
