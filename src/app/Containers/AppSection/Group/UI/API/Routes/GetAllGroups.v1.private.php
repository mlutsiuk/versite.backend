<?php

/**
 * @apiGroup            Group
 * @apiName             GetAllGroups
 *
 * @api                 {GET} /v1/groups Get All Groups
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} parameters here...
 *
 * @apiUse              GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\Group\UI\API\Controllers\GetAllGroupsController;
use Illuminate\Support\Facades\Route;

Route::get('groups', [GetAllGroupsController::class, 'getAllGroups'])
    ->middleware(['auth:api']);

