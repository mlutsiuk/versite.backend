<?php

/**
 * @apiGroup            Lesson
 * @apiName             GetAllLessons
 *
 * @api                 {GET} /v1/lessons Get All Lessons
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiUse              GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\Lesson\UI\API\Controllers\GetAllLessonsController;
use Illuminate\Support\Facades\Route;

Route::get('lessons', [GetAllLessonsController::class, 'getAllLessons'])
    ->middleware(['auth:api']);

