<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Student\Actions\FindStudentByIdAction;
use App\Containers\AppSection\Student\UI\API\Requests\FindStudentByIdRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindStudentByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findStudentById(FindStudentByIdRequest $request, $id): array
    {
        $student = app(FindStudentByIdAction::class)->run($id);

        return $this->transform($student, StudentTransformer::class);
    }
}
