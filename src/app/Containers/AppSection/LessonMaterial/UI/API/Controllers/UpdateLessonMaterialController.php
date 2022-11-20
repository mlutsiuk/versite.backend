<?php

namespace App\Containers\AppSection\LessonMaterial\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\LessonMaterial\Actions\UpdateLessonMaterialAction;
use App\Containers\AppSection\LessonMaterial\Data\Dto\UpdateLessonMaterialDto;
use App\Containers\AppSection\LessonMaterial\UI\API\Requests\UpdateLessonMaterialRequest;
use App\Containers\AppSection\LessonMaterial\UI\API\Transformers\LessonMaterialTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateLessonMaterialController extends ApiController
{
    /**
     * @param UpdateLessonMaterialRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateLessonMaterial(UpdateLessonMaterialRequest $request, $lessonId): array
    {
        $dto = new UpdateLessonMaterialDto($request->validated());
        $lessonMaterial = app(UpdateLessonMaterialAction::class)->run($dto, $lessonId);

        return $this->transform($lessonMaterial, LessonMaterialTransformer::class);
    }
}
