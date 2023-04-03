<?php

/**
 * @apiGroup            Assignment
 * @apiName             UpdateAssignment
 *
 * @api                 {PATCH} /v1/assignments/:id Update Assignment
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

use App\Containers\AppSection\Assignment\UI\API\Controllers\UpdateAssignmentController;
use Illuminate\Support\Facades\Route;

Route::patch('assignments/{id}', [UpdateAssignmentController::class, 'updateAssignment'])
    ->middleware(['auth:api']);

