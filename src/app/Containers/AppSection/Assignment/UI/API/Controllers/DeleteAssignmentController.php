<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use App\Containers\AppSection\Assignment\Actions\DeleteAssignmentAction;
use App\Containers\AppSection\Assignment\UI\API\Requests\DeleteAssignmentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteAssignmentController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteAssignment(DeleteAssignmentRequest $request, $id): JsonResponse
    {
        app(DeleteAssignmentAction::class)->run($id);

        return $this->noContent();
    }
}
