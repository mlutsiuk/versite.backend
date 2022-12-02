<?php

/**
 * @apiGroup            Course
 * @apiName             GetAllCourseLesson
 *
 * @api                 {GET} /v1/courses/:id/lessons Get All Course Lessons
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Parent course id
 *
 * @apiUse              GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\Course\UI\API\Controllers\GetAllCourseLessonsController;
use Illuminate\Support\Facades\Route;

Route::get('courses/{id}/lessons', [GetAllCourseLessonsController::class, 'getAllCourseLessons'])
    ->middleware(['auth:api']);

