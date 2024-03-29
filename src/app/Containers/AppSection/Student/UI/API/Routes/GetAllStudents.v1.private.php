<?php

/**
 * @apiGroup            Student
 * @apiName             GetAllStudents
 *
 * @api                 {GET} /v1/students Get All Students
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

use App\Containers\AppSection\Student\UI\API\Controllers\GetAllStudentsController;
use Illuminate\Support\Facades\Route;

Route::get('students', [GetAllStudentsController::class, 'getAllStudents'])
    ->middleware(['auth:api']);

