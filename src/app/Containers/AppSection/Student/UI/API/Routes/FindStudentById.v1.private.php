<?php

/**
 * @apiGroup            Student
 * @apiName             FindStudentById
 *
 * @api                 {GET} /v1/students/:id Find Student By Id
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

use App\Containers\AppSection\Student\UI\API\Controllers\FindStudentByIdController;
use Illuminate\Support\Facades\Route;

Route::get('students/{id}', [FindStudentByIdController::class, 'findStudentById'])
    ->middleware(['auth:api']);

