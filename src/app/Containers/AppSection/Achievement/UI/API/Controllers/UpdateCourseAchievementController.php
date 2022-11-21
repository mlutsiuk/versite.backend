<?php

namespace App\Containers\AppSection\Achievement\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Achievement\Actions\UpdateCourseAchievementAction;
use App\Containers\AppSection\Achievement\Data\Dto\UpdateCourseAchievementDto;
use App\Containers\AppSection\Achievement\UI\API\Requests\UpdateCourseAchievementRequest;
use App\Containers\AppSection\Achievement\UI\API\Transformers\CourseAchievementTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCourseAchievementController extends ApiController
{
    /**
     * @param UpdateCourseAchievementRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateAchievement(UpdateCourseAchievementRequest $request): array
    {
        $dto = new UpdateCourseAchievementDto($request->validated());
        $achievement = app(UpdateCourseAchievementAction::class)->run($dto, $request->validated()['id']);

        return $this->transform($achievement, CourseAchievementTransformer::class);
    }
}
