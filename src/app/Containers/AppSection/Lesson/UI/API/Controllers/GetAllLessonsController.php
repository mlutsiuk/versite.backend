<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Lesson\Actions\GetAllLessonsAction;
use App\Containers\AppSection\Lesson\UI\API\Requests\GetAllLessonsRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllLessonsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllLessons(GetAllLessonsRequest $request): array
    {
        $lessons = app(GetAllLessonsAction::class)->run();

        return $this->transform($lessons, LessonTransformer::class);
    }
}
