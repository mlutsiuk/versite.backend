<?php

/**
 * @apiGroup            Assignment
 * @apiName             CreateAssignment
 *
 * @api                 {POST} /v1/assignments Create Assignment
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

use App\Containers\AppSection\Assignment\UI\API\Controllers\CreateAssignmentController;
use Illuminate\Support\Facades\Route;

Route::post('assignments', [CreateAssignmentController::class, 'createAssignment'])
    ->middleware(['auth:api']);

