<?php

/**
 * @apiGroup            User
 * @apiName             FindUserByNickname
 *
 * @api                 {GET} /v1/users/:nickname Find User By Nickname
 * @apiDescription      Endpoint description here...
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} nickname User nickname
 *
 * @apiUse              UserSuccessSingleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\FindUserByNicknameController;
use Illuminate\Support\Facades\Route;

Route::get('users/{nickname}', [FindUserByNicknameController::class, 'findUserByNickname'])
    ->middleware(['auth:api']);

