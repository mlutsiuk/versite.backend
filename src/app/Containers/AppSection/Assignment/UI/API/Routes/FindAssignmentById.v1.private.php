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

use App\Containers\AppSection\Assignment\UI\API\Controllers\FindAssignmentByIdController;
use Illuminate\Support\Facades\Route;

Route::get('assignments/{id}', [FindAssignmentByIdController::class, 'findAssignmentById'])
    ->middleware(['auth:api']);

