<?php

/**
 * @apiGroup            CourseAchievement
 * @apiName             FindAchievementById
 *
 * @api                 {GET} /v1/achievements/:id Find CourseAchievement By Id
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

use App\Containers\AppSection\Achievement\UI\API\Controllers\FindCourseAchievementByIdController;
use Illuminate\Support\Facades\Route;

Route::get('achievements/{id}', [FindCourseAchievementByIdController::class, 'findAchievementById'])
    ->middleware(['auth:api']);

