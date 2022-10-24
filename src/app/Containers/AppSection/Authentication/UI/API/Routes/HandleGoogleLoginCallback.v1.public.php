<?php

/**
 * @apiGroup            Authentication
 * @apiName             HandleGoogleLoginCallback
 *
 * @api                 {GET} /v1/auth/login/google/callback Google Login: Handle Callback
 * @apiDescription      Handle Google login callback
 *
 * @apiVersion          1.0.0
 * @apiPermission       none
 *
 * @apiHeader           {String} accept=application/json
 *
 * @apiUse              AccessTokenSuccessResponse
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\GoogleLoginController;
use Illuminate\Support\Facades\Route;

Route::get('auth/login/google/callback', [GoogleLoginController::class, 'handleCallback'])
    ->middleware(['guest']);

