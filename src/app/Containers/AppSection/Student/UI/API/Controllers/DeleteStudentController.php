<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use App\Containers\AppSection\Student\Actions\DeleteStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\DeleteStudentRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteStudentController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteStudent(DeleteStudentRequest $request, $id): JsonResponse
    {
        app(DeleteStudentAction::class)->run($id);

        return $this->noContent();
    }
}
