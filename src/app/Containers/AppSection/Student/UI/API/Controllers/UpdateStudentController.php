<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Student\Actions\UpdateStudentAction;
use App\Containers\AppSection\Student\Data\Dto\UpdateStudentDto;
use App\Containers\AppSection\Student\UI\API\Requests\UpdateStudentRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateStudentController extends ApiController
{
    /**
     * @param UpdateStudentRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateStudent(UpdateStudentRequest $request, $id): array
    {
        $dto = new UpdateStudentDto($request->validated());
        $student = app(UpdateStudentAction::class)->run($dto, $id);

        return $this->transform($student, StudentTransformer::class);
    }
}
