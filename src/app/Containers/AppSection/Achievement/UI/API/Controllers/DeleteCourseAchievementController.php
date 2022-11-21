<?php

namespace App\Containers\AppSection\Achievement\UI\API\Controllers;

use App\Containers\AppSection\Achievement\Actions\DeleteCourseAchievementAction;
use App\Containers\AppSection\Achievement\UI\API\Requests\DeleteCourseAchievementRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteCourseAchievementController extends ApiController
{
    /**
     * @param DeleteCourseAchievementRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteAchievement(DeleteCourseAchievementRequest $request): JsonResponse
    {
        app(DeleteCourseAchievementAction::class)->run($request->validated()['id']);

        return $this->noContent();
    }
}
