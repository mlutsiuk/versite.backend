<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Tasks\FindMyAssignmentSubmissionTask;
use App\Containers\AppSection\Assignment\UI\API\Requests\FindMyAssignmentSubmissionRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentSubmissionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class FindMyAssignmentSubmissionController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function findSubmission(FindMyAssignmentSubmissionRequest $request, $assignment_id): array
    {
        $submission = app(FindMyAssignmentSubmissionTask::class)->run($assignment_id);

        return $this->transform($submission, AssignmentSubmissionTransformer::class);
    }
}
