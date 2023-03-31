<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Lesson\Actions\FindLessonMaterialByIdAction;
use App\Containers\AppSection\Lesson\UI\API\Requests\FindLessonMaterialByIdRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonMaterialTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindLessonMaterialByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findLessonMaterialById(FindLessonMaterialByIdRequest $request, $lessonId): array
    {
        $lessonMaterial = app(FindLessonMaterialByIdAction::class)->run($lessonId);

        return $this->transform($lessonMaterial, LessonMaterialTransformer::class);
    }
}
