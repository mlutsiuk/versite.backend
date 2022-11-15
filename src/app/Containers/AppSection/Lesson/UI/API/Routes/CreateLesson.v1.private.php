<?php

/**
 * @apiGroup            Lesson
 * @apiName             CreateLesson
 *
 * @api                 {POST} /v1/lessons Create Lesson
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiBody             {String} title
 * @apiBody             {String} group_id Group which are lesson created for
 * @apiBody             {Datetime} open_at When lesson are being available to student
 *
 * @apiUse              LessonSuccessSingleResponse
 */

use App\Containers\AppSection\Lesson\UI\API\Controllers\CreateLessonController;
use Illuminate\Support\Facades\Route;

Route::post('lessons', [CreateLessonController::class, 'createLesson'])
    ->middleware(['auth:api']);

