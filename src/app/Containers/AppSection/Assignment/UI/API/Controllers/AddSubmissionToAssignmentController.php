<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Data\Dto\CreateAssignmentSubmissionDto;
use App\Containers\AppSection\Assignment\Tasks\CreateAssignmentSubmissionTask;
use App\Containers\AppSection\Assignment\UI\API\Requests\CreateAssignmentSubmissionRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentSubmissionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class AddSubmissionToAssignmentController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function addSubmission(CreateAssignmentSubmissionRequest $request, $assignment_id): JsonResponse
    {
        $dto = new CreateAssignmentSubmissionDto([
            'content' => $request->validated('content')
        ]);
        $submission = app(CreateAssignmentSubmissionTask::class)->run($dto, $assignment_id);

        return $this->created($this->transform($submission, AssignmentSubmissionTransformer::class));
    }
}
