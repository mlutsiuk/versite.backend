<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Lesson\Actions\FindLessonByIdAction;
use App\Containers\AppSection\Lesson\UI\API\Requests\FindLessonByIdRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindLessonByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findLessonById(FindLessonByIdRequest $request, $id): array
    {
        $lesson = app(FindLessonByIdAction::class)->run($id);

        return $this->transform($lesson, LessonTransformer::class);
    }
}
