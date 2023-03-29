<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Lesson\Actions\UpdateLessonMaterialAction;
use App\Containers\AppSection\Lesson\Data\Dto\UpdateLessonMaterialDto;
use App\Containers\AppSection\Lesson\UI\API\Requests\UpdateLessonMaterialRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonMaterialTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateLessonMaterialController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws NotFoundException
     */
    public function updateLessonMaterial(UpdateLessonMaterialRequest $request, $lessonId): array
    {
        $dto = new UpdateLessonMaterialDto($request->validated());
        $lessonMaterial = app(UpdateLessonMaterialAction::class)->run($dto, $lessonId);

        return $this->transform($lessonMaterial, LessonMaterialTransformer::class);
    }
}
