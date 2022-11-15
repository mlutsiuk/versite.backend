<?php

/**
 * @apiGroup            Group
 * @apiName             UpdateGroup
 *
 * @api                 {PATCH} /v1/groups/:id Update Group
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Group id
 *
 * @apiUse              GroupSuccessSingleResponse
 */

use App\Containers\AppSection\Group\UI\API\Controllers\UpdateGroupController;
use Illuminate\Support\Facades\Route;

Route::patch('groups/{id}', [UpdateGroupController::class, 'updateGroup'])
    ->middleware(['auth:api']);

