<?php

namespace App\Containers\AppSection\Assignment\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Assignment\Actions\FindAssignmentByIdAction;
use App\Containers\AppSection\Assignment\UI\API\Requests\FindAssignmentByIdRequest;
use App\Containers\AppSection\Assignment\UI\API\Transformers\AssignmentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindAssignmentByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findAssignmentById(FindAssignmentByIdRequest $request, $id): array
    {
        $assignment = app(FindAssignmentByIdAction::class)->run($id);

        return $this->transform($assignment, AssignmentTransformer::class);
    }
}
