<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Actions\GetAllLessonAssignmentsAction;
use App\Containers\AppSection\Assignment\UI\API\Requests\GetAllAssignmentsRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllLessonAssignmentsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllLessonAssignments(GetAllAssignmentsRequest $request, $lessonId): array
    {
        $assignments = app(GetAllLessonAssignmentsAction::class)->run($lessonId);

        return $this->transform($assignments, AssignmentTransformer::class);
    }
}
