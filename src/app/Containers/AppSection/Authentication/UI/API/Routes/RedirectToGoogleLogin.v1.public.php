<?php

/**
 * @apiGroup           Authentication
 * @apiName            RedirectToGoogleLogin
 *
 * @api                {GET} /v1/auth/login/google/redirect Redirect To Google Login
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "url" => "https://accounts.google.com/o/oauth2/auth?client_id=1046..."
 * }
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\GoogleLoginController;
use Illuminate\Support\Facades\Route;

Route::get('auth/login/google/redirect', [GoogleLoginController::class, 'redirect'])
    ->middleware(['guest']);

