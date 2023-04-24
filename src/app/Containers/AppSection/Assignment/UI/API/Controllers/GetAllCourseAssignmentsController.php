<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Actions\GetAllCourseAssignmentsAction;
use App\Containers\AppSection\Assignment\UI\API\Requests\GetAllAssignmentsRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseAssignmentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCourseAssignments(GetAllAssignmentsRequest $request, $id): array
    {
        $assignments = app(GetAllCourseAssignmentsAction::class)->run($id);

        return $this->transform($assignments, AssignmentTransformer::class);
    }
}
