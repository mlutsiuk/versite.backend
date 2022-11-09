<?php

/**
 * @apiGroup            Group
 * @apiName             CreateGroup
 *
 * @api                 {POST} /v1/groups Create Group
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

use App\Containers\AppSection\Group\UI\API\Controllers\CreateGroupController;
use Illuminate\Support\Facades\Route;

Route::post('groups', [CreateGroupController::class, 'createGroup'])
    ->middleware(['auth:api']);

