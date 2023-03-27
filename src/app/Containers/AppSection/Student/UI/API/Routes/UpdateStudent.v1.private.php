<?php

/**
 * @apiGroup            Student
 * @apiName             UpdateStudent
 *
 * @api                 {PATCH} /v1/students/:id Update Student
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

use App\Containers\AppSection\Student\UI\API\Controllers\UpdateStudentController;
use Illuminate\Support\Facades\Route;

Route::patch('students/{id}', [UpdateStudentController::class, 'updateStudent'])
    ->middleware(['auth:api']);

