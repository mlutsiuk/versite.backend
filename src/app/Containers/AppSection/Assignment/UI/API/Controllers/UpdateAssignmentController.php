<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Actions\UpdateAssignmentAction;
use App\Containers\AppSection\Assignment\Data\Dto\UpdateAssignmentDto;
use App\Containers\AppSection\Assignment\UI\API\Requests\UpdateAssignmentRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateAssignmentController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateAssignment(UpdateAssignmentRequest $request, $id): array
    {
        $dto = new UpdateAssignmentDto($request->validated());
        $assignment = app(UpdateAssignmentAction::class)->run($dto, $id);

        return $this->transform($assignment, AssignmentTransformer::class);
    }
}
