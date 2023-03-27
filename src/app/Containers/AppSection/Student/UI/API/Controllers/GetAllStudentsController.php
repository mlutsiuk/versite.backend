<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Student\Actions\GetAllStudentsAction;
use App\Containers\AppSection\Student\UI\API\Requests\GetAllStudentsRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllStudentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllStudents(GetAllStudentsRequest $request): array
    {
        $students = app(GetAllStudentsAction::class)->run();

        return $this->transform($students, StudentTransformer::class);
    }
}
