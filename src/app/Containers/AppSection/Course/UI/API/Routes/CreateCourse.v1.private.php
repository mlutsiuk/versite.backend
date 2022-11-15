<?php

/**
 * @apiGroup            Course
 * @apiName             CreateCourse
 *
 * @api                 {POST} /v1/courses Create Course
 * @apiDescription      Create new course authored by authenticated user
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiBody             {String} slug
 * @apiBody             {String} title
 * @apiBody             {String} description
 *
 * @apiUse              CourseSuccessSingleResponse
 */

use App\Containers\AppSection\Course\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('courses', [Controller::class, 'createCourse'])
    ->middleware(['auth:api']);

