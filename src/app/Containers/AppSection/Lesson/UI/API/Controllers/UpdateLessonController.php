<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Lesson\Actions\UpdateLessonAction;
use App\Containers\AppSection\Lesson\Data\Dto\UpdateLessonDto;
use App\Containers\AppSection\Lesson\UI\API\Requests\UpdateLessonRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateLessonController extends ApiController
{
    /**
     * @param UpdateLessonRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateLesson(UpdateLessonRequest $request): array
    {
        $dto = new UpdateLessonDto($request->validated());
        $lesson = app(UpdateLessonAction::class)->run($dto, $request->validated()['id']);

        return $this->transform($lesson, LessonTransformer::class);
    }
}
