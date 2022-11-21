<?php

/**
 * @apiGroup            CourseAchievement
 * @apiName             CreateAchievement
 *
 * @api                 {POST} /v1/courses/:courseId/achievements Create CourseAchievement
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} courseId Parent course id
 *
 * @apiSuccessExample   {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Achievement\UI\API\Controllers\CreateCourseAchievementController;
use Illuminate\Support\Facades\Route;

Route::post('courses/{courseId}/achievements', [CreateCourseAchievementController::class, 'createAchievement'])
    ->middleware(['auth:api']);

