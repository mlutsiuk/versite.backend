<?php

namespace App\Containers\AppSection\Achievement\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Achievement\Actions\GetAllCourseAchievementsAction;
use App\Containers\AppSection\Achievement\UI\API\Requests\GetAllCourseAchievementsRequest;
use App\Containers\AppSection\Achievement\UI\API\Transformers\CourseAchievementTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCourseAchievementsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllAchievements(GetAllCourseAchievementsRequest $request, $courseId): array
    {
        $achievements = app(GetAllCourseAchievementsAction::class)->run($courseId);

        return $this->transform($achievements, CourseAchievementTransformer::class);
    }
}
