<?php

/**
 * @apiGroup            Authorization
 * @apiName             AssignPermissionsToUser
 *
 * @api                 {PATCH} /v1/users/:user_id/permissions Attach Permissions To User
 * @apiDescription      Attach direct permissions to user
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => 'manage-permissions', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} user_id user's id
 * @apiBody             {Array} permission_ids Array of Permissions ID's
 *
 * @apiUse              UserSuccessSingleResponse
 */

use App\Containers\AppSection\Authorization\UI\API\Controllers\AttachPermissionsToUserController;
use Illuminate\Support\Facades\Route;

Route::patch('users/{user_id}/permissions', [AttachPermissionsToUserController::class, 'attachPermissionsToUser'])
    ->middleware(['auth:api']);

