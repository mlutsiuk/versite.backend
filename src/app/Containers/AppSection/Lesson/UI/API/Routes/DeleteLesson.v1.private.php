<?php

/**
 * @apiGroup            Lesson
 * @apiName             DeleteLesson
 *
 * @api                 {DELETE} /v1/lessons/:id Delete Lesson
 * @apiDescription      Endpoint description here...
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} parameters here...
 *
 * @apiSuccessExample   {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Lesson\UI\API\Controllers\DeleteLessonController;
use Illuminate\Support\Facades\Route;

Route::delete('lessons/{id}', [DeleteLessonController::class, 'deleteLesson'])
    ->middleware(['auth:api']);

