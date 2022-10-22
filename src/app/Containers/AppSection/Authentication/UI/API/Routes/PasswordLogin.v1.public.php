<?php

/**
 * @apiGroup           Authentication
 * @apiName            PasswordLogin
 *
 * @api                {POST} /v1/auth/login/password PasswordLogin
 * @apiDescription     Login Users using their email and passwords.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiBody           {String} email
 * @apiBody           {String} password
 *
 * @apiSuccessExample  {json}       Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "token_type": "Bearer",
 * "expires_in": 315360000,
 * "access_token": "eyJ0eXAiOiJKV1QiLCJhbG..."
 * }
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\PasswordLoginController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login/password', [PasswordLoginController::class, 'login']);

