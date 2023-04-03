<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Actions\CreateAssignmentAction;
use App\Containers\AppSection\Assignment\Data\Dto\CreateAssignmentDto;
use App\Containers\AppSection\Assignment\UI\API\Requests\CreateAssignmentRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateAssignmentController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createAssignment(CreateAssignmentRequest $request): JsonResponse
    {
        $dto = new CreateAssignmentDto($request->validated());
        $assignment = app(CreateAssignmentAction::class)->run($dto);

        return $this->created($this->transform($assignment, AssignmentTransformer::class));
    }
}
