<?php

/**
 * @apiGroup            User
 * @apiName             GetAllUsers
 *
 * @api                 {GET} /v1/users Get All Users
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiUse              GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\GetAllUsersController;
use Illuminate\Support\Facades\Route;

Route::get('users', [GetAllUsersController::class, 'getAllUsers'])
    ->middleware(['auth:api']);

