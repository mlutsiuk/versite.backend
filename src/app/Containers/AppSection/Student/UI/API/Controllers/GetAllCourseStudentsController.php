<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Student\Tasks\GetAllCourseStudentsTask;
use App\Containers\AppSection\Student\UI\API\Requests\GetAllStudentsRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseStudentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCourseStudents(GetAllStudentsRequest $request, $courseId): array
    {
        $students = app(GetAllCourseStudentsTask::class)->run($courseId);

        return $this->transform($students, StudentTransformer::class);
    }
}
