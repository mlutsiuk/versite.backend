<?php

/**
 * @apiGroup            Course
 * @apiName             DeleteCourse
 *
 * @api                 {DELETE} /v1/courses/:id Delete Course
 * @apiDescription      Endpoint description here...
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Course id
 *
 * @apiSuccessExample   {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Course\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('courses/{id}', [Controller::class, 'deleteCourse'])
    ->middleware(['auth:api']);

