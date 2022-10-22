<?php

/**
 * @apiGroup           Authentication
 * @apiName            HandleGoogleLoginCallback
 *
 * @api                {GET} /v1/auth/login/google/callback Handle Google Login Callback
 * @apiDescription     Handle Google login callback
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "token_type": "Bearer",
 * "expires_in": 315360000,
 * "access_token": "eyJ0eXAiOiJKV1QiLCJhbG..."
 * }
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\GoogleLoginController;
use Illuminate\Support\Facades\Route;

Route::get('auth/login/google/callback', [GoogleLoginController::class, 'handleCallback'])
    ->middleware(['guest']);

