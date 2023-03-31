<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Student\Actions\CreateStudentAction;
use App\Containers\AppSection\Student\Data\Dto\CreateStudentDto;
use App\Containers\AppSection\Student\UI\API\Requests\CreateStudentRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateStudentController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createStudent(CreateStudentRequest $request): JsonResponse
    {
        $dto = new CreateStudentDto($request->validated());
        $student = app(CreateStudentAction::class)->run($dto);

        return $this->created($this->transform($student, StudentTransformer::class));
    }
}
