<?php

namespace App\Containers\AppSection\LessonMaterial\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\LessonMaterial\Actions\FindLessonMaterialByIdAction;
use App\Containers\AppSection\LessonMaterial\UI\API\Requests\FindLessonMaterialByIdRequest;
use App\Containers\AppSection\LessonMaterial\UI\API\Transformers\LessonMaterialTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindLessonMaterialByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findLessonMaterialById(FindLessonMaterialByIdRequest $request): array
    {
        $lessonMaterial = app(FindLessonMaterialByIdAction::class)->run($request->validated()['lessonId']);

        return $this->transform($lessonMaterial, LessonMaterialTransformer::class);
    }
}
