<?php

namespace App\Containers\AppSection\Achievement\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Achievement\Actions\CreateCourseAchievementAction;
use App\Containers\AppSection\Achievement\Data\Dto\CreateCourseAchievementDto;
use App\Containers\AppSection\Achievement\UI\API\Requests\CreateCourseAchievementRequest;
use App\Containers\AppSection\Achievement\UI\API\Transformers\CourseAchievementTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateCourseAchievementController extends ApiController
{
    /**
     * @param CreateCourseAchievementRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createAchievement(CreateCourseAchievementRequest $request, $courseId): JsonResponse
    {
        $dto = new CreateCourseAchievementDto($request->validated());
        $achievement = app(CreateCourseAchievementAction::class)->run($dto, $courseId);

        return $this->created($this->transform($achievement, CourseAchievementTransformer::class));
    }
}
