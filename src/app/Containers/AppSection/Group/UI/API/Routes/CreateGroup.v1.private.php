<?php

/**
 * @apiGroup            Group
 * @apiName             CreateGroup
 *
 * @api                 {POST} /v1/groups Create Group
 * @apiDescription      Create new group for course
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiBody             {String} course_id Parent course for the group
 * @apiBody             {String} title
 * @apiBody             {Boolean} is_private Is registration to this group are open, or it requires personal invitation
 * @apiBody             {Timestamp} registration_start Registration start for students
 * @apiBody             {Timestamp} registration_end Registration deadline for students
 *
 * @apiUse              GroupSuccessSingleResponse
 */

use App\Containers\AppSection\Group\UI\API\Controllers\CreateGroupController;
use Illuminate\Support\Facades\Route;

Route::post('groups', [CreateGroupController::class, 'createGroup'])
    ->middleware(['auth:api']);

