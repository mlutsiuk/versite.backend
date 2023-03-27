<?php

/**
 * @apiGroup            Student
 * @apiName             DeleteStudent
 *
 * @api                 {DELETE} /v1/students/:id Delete Student
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

use App\Containers\AppSection\Student\UI\API\Controllers\DeleteStudentController;
use Illuminate\Support\Facades\Route;

Route::delete('students/{id}', [DeleteStudentController::class, 'deleteStudent'])
    ->middleware(['auth:api']);

