<?php

/**
 * @apiGroup            Assignment
 * @apiName             FindAssignmentById
 *
 * @api                 {GET} /v1/assignments/:id Find Assignment By Id
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

use App\Containers\AppSection\Assignment\UI\API\Controllers\AddSubmissionToAssignmentController;
use Illuminate\Support\Facades\Route;

Route::post('assignments/{assignment_id}/submissions/my',
    [AddSubmissionToAssignmentController::class, 'addSubmission']
)->middleware(['auth:api']);

