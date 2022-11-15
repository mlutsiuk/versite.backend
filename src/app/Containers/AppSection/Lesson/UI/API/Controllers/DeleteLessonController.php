<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use App\Containers\AppSection\Lesson\Actions\DeleteLessonAction;
use App\Containers\AppSection\Lesson\UI\API\Requests\DeleteLessonRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteLessonController extends ApiController
{
    /**
     * @param DeleteLessonRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteLesson(DeleteLessonRequest $request): JsonResponse
    {
        app(DeleteLessonAction::class)->run($request->validated()['id']);

        return $this->noContent();
    }
}
