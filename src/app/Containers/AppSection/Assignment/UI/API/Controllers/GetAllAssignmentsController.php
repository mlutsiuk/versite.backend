<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Actions\GetAllAssignmentsAction;
use App\Containers\AppSection\Assignment\UI\API\Requests\GetAllAssignmentsRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllAssignmentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllAssignments(GetAllAssignmentsRequest $request): array
    {
        $assignments = app(GetAllAssignmentsAction::class)->run();

        return $this->transform($assignments, AssignmentTransformer::class);
    }
}
