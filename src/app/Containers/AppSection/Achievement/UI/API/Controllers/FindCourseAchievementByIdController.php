<?php

namespace App\Containers\AppSection\Achievement\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Achievement\Actions\FindCourseAchievementByIdAction;
use App\Containers\AppSection\Achievement\UI\API\Requests\FindCourseAchievementByIdRequest;
use App\Containers\AppSection\Achievement\UI\API\Transformers\CourseAchievementTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindCourseAchievementByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findAchievementById(FindCourseAchievementByIdRequest $request): array
    {
        $achievement = app(FindCourseAchievementByIdAction::class)->run($request->validated()['id']);

        return $this->transform($achievement, CourseAchievementTransformer::class);
    }
}
