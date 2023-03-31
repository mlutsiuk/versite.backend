<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Lesson\Actions\CreateLessonAction;
use App\Containers\AppSection\Lesson\Data\Dto\CreateLessonDto;
use App\Containers\AppSection\Lesson\Tasks\CreateLessonMaterialTask;
use App\Containers\AppSection\Lesson\UI\API\Requests\CreateLessonRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateLessonController extends ApiController
{
    /**
     * @param CreateLessonRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createLesson(CreateLessonRequest $request): JsonResponse
    {
        $dto = new CreateLessonDto($request->validated());
        $lesson = app(CreateLessonAction::class)->run($dto);
        app(CreateLessonMaterialTask::class)->run($lesson->id);

        return $this->created($this->transform($lesson, LessonTransformer::class));
    }
}
