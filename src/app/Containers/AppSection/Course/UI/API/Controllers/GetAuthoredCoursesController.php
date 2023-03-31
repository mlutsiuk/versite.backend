<?php

namespace App\Containers\AppSection\Course\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Course\Actions\GetAuthoredCoursesAction;
use App\Containers\AppSection\Course\UI\API\Requests\GetAuthoredCoursesRequest;
use App\Containers\AppSection\Course\UI\API\Transformers\CourseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAuthoredCoursesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAuthoredCourses(GetAuthoredCoursesRequest $request): array
    {
        $courses = app(GetAuthoredCoursesAction::class)->run();

        return $this->transform($courses, CourseTransformer::class);
    }
}
