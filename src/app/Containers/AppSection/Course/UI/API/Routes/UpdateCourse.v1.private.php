<?php

/**
 * @apiGroup            Course
 * @apiName             UpdateCourse
 *
 * @api                 {PATCH} /v1/courses/:id Update Course
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Course id
 *
 * @apiBody             {String} title
 * @apiBody             {String} description
 *
 * @apiUse              CourseSuccessSingleResponse
 */

use App\Containers\AppSection\Course\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('courses/{id}', [Controller::class, 'updateCourse'])
    ->middleware(['auth:api']);

