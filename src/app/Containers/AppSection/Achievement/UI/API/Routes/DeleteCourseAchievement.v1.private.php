<?php

/**
 * @apiGroup            CourseAchievement
 * @apiName             DeleteAchievement
 *
 * @api                 {DELETE} /v1/achievements/:id Delete CourseAchievement
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

use App\Containers\AppSection\Achievement\UI\API\Controllers\DeleteCourseAchievementController;
use Illuminate\Support\Facades\Route;

Route::delete('achievements/{id}', [DeleteCourseAchievementController::class, 'deleteAchievement'])
    ->middleware(['auth:api']);

