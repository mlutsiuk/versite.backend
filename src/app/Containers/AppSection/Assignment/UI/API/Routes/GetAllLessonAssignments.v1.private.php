<?php

/**
 * @apiGroup            Assignment
 * @apiName             GetAllAssignments
 *
 * @api                 {GET} /v1/assignments Get All Assignments
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

use App\Containers\AppSection\Assignment\UI\API\Controllers\GetAllLessonAssignmentsController;
use Illuminate\Support\Facades\Route;

Route::get('lessons/{lessonId}/assignments', [GetAllLessonAssignmentsController::class, 'getAllLessonAssignments'])
    ->middleware(['auth:api']);

