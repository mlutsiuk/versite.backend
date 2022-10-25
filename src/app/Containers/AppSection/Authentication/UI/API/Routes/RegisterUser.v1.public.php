<?php

/**
 * @apiGroup            Authentication
 * @apiName             RegisterUser
 *
 * @api                 {POST} /v1/auth/register Register User
 * @apiDescription      Register user to authenticate via password
 *
 * @apiVersion          1.0.0
 * @apiPermission       none
 *
 * @apiHeader           {String} accept=application/json
 *
 * @apiBody             {String} email
 * @apiBody             {String} password min: 8
 *
 * @apiUse              AccessTokenSuccessResponse
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', [RegisterUserController::class, 'registerUser'])
    ->middleware(['guest']);

