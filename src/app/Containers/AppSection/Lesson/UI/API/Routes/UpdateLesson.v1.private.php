<?php

/**
 * @apiGroup            Lesson
 * @apiName             UpdateLesson
 *
 * @api                 {PATCH} /v1/lessons/:id Update Lesson
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Lesson id
 *
 * @apiBody             {String} title
 * @apiBody             {String} group_id Group which are lesson created for
 * @apiBody             {Datetime} open_at When lesson are being available to student
 *
 * @apiUse              LessonSuccessSingleResponse
 */

use App\Containers\AppSection\Lesson\UI\API\Controllers\UpdateLessonController;
use Illuminate\Support\Facades\Route;

Route::patch('lessons/{id}', [UpdateLessonController::class, 'updateLesson'])
    ->middleware(['auth:api']);

