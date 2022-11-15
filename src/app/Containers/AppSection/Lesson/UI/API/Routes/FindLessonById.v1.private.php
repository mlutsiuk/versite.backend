<?php

/**
 * @apiGroup            Lesson
 * @apiName             FindLessonById
 *
 * @api                 {GET} /v1/lessons/:id Find Lesson By Id
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

use App\Containers\AppSection\Lesson\UI\API\Controllers\FindLessonByIdController;
use Illuminate\Support\Facades\Route;

Route::get('lessons/{id}', [FindLessonByIdController::class, 'findLessonById'])
    ->middleware(['auth:api']);

