<?php

/**
 * @apiGroup            CourseAchievement
 * @apiName             UpdateAchievement
 *
 * @api                 {PATCH} /v1/achievements/:id Update CourseAchievement
 * @apiDescription      Endpoint description here...
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id CourseAchievement id
 *
 * @apiSuccessExample   {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Achievement\UI\API\Controllers\UpdateCourseAchievementController;
use Illuminate\Support\Facades\Route;

Route::patch('achievements/{id}', [UpdateCourseAchievementController::class, 'updateAchievement'])
    ->middleware(['auth:api']);

