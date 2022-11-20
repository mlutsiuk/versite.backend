<?php

/**
 * @apiGroup            LessonMaterial
 * @apiName             UpdateLessonMaterial
 *
 * @api                 {PATCH} /v1/lesson-materials/:id Update Lesson Material
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

use App\Containers\AppSection\LessonMaterial\UI\API\Controllers\UpdateLessonMaterialController;
use Illuminate\Support\Facades\Route;

Route::patch('lessons/{lessonId}/material', [UpdateLessonMaterialController::class, 'updateLessonMaterial'])
    ->middleware(['auth:api']);

