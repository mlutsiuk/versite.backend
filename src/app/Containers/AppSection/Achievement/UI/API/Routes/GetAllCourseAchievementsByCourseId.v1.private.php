<?php

/**
 * @apiGroup            CourseAchievement
 * @apiName             GetAllAchievements
 *
 * @api                 {GET} /v1/courses/:courseId/achievements Get All Achievements
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} courseId Parent Course id
 *
 * @apiSuccessExample   {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Achievement\UI\API\Controllers\GetAllCourseAchievementsController;
use Illuminate\Support\Facades\Route;

Route::get('courses/{courseId}/achievements', [GetAllCourseAchievementsController::class, 'getAllAchievements'])
    ->middleware(['auth:api']);

