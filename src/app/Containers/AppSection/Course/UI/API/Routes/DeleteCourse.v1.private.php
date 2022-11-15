<?php

/**
 * @apiGroup            Course
 * @apiName             DeleteCourse
 *
 * @api                 {DELETE} /v1/courses/:id Delete Course
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Course id
 *
 * @apiUse              GeneralAcceptedResponse
 */

use App\Containers\AppSection\Course\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('courses/{id}', [Controller::class, 'deleteCourse'])
    ->middleware(['auth:api']);

