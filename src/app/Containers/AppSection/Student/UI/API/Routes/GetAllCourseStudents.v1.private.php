<?php

/**
 * @apiGroup            Student
 * @apiName             GetAllCourseStudents
 *
 * @api                 {GET} /v1/courses/:courseId/students Get All Course Students
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

use App\Containers\AppSection\Student\UI\API\Controllers\GetAllCourseStudentsController;
use Illuminate\Support\Facades\Route;

Route::get('courses/{courseId}/students', [GetAllCourseStudentsController::class, 'getAllCourseStudents'])
    ->middleware(['auth:api']);

