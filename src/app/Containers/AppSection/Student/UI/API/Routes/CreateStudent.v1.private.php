<?php

/**
 * @apiGroup            Student
 * @apiName             CreateStudent
 *
 * @api                 {POST} /v1/students Create Student
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

use App\Containers\AppSection\Student\UI\API\Controllers\CreateStudentController;
use Illuminate\Support\Facades\Route;

Route::post('students', [CreateStudentController::class, 'createStudent'])
    ->middleware(['auth:api']);

