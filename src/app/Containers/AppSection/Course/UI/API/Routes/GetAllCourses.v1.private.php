<?php

/**
 * @apiGroup            Course
 * @apiName             GetAllCourses
 *
 * @api                 {GET} /v1/courses Get All Courses
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiUse              GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\Course\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('courses', [Controller::class, 'getAllCourses'])
    ->middleware(['auth:api']);

