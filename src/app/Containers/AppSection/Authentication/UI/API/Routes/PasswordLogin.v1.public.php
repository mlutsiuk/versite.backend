<?php

/**
 * @apiGroup            Authentication
 * @apiName             PasswordLogin
 *
 * @api                 {POST} /v1/auth/login/password Password Login
 * @apiDescription      Login Users using their email and passwords.
 *
 * @apiVersion          1.0.0
 * @apiPermission       none
 *
 * @apiHeader           {String} accept=application/json
 *
 * @apiBody             {String} email
 * @apiBody             {String} password
 *
 * @apiUse              AccessTokenSuccessResponse
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\PasswordLoginController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login/password', [PasswordLoginController::class, 'login']);

