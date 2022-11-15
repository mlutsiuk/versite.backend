<?php

/**
 * @apiGroup            Group
 * @apiName             DeleteGroup
 *
 * @api                 {DELETE} /v1/groups/:id Delete Group
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Group id
 *
 * @apiUse              GeneralAcceptedResponse
 */

use App\Containers\AppSection\Group\UI\API\Controllers\DeleteGroupController;
use Illuminate\Support\Facades\Route;

Route::delete('groups/{id}', [DeleteGroupController::class, 'deleteGroup'])
    ->middleware(['auth:api']);

