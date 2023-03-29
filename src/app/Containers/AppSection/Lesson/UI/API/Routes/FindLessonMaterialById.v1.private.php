<?php

/**
 * @apiGroup            LessonMaterial
 * @apiName             FindLessonMaterialById
 *
 * @api                 {GET} /v1/lesson-materials/:id Find Lesson Material By Id
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

use App\Containers\AppSection\Lesson\UI\API\Controllers\FindLessonMaterialByIdController;
use Illuminate\Support\Facades\Route;

Route::get('lessons/{lessonId}/material', [FindLessonMaterialByIdController::class, 'findLessonMaterialById'])
    ->middleware(['auth:api']);

