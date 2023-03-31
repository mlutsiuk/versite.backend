<?php

namespace App\Containers\AppSection\Lesson\UI\API\Controllers;

use App\Containers\AppSection\Lesson\Actions\GetAllCourseLessonsAction;
use App\Containers\AppSection\Lesson\UI\API\Requests\GetAllCourseLessonsRequest;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetAllCourseLessonsController extends ApiController
{
    public function getAllCourseLessons(GetAllCourseLessonsRequest $request, $id)
    {
        $lessons = app(GetAllCourseLessonsAction::class)->run($id);

        return $this->transform($lessons, LessonTransformer::class);
    }
}
