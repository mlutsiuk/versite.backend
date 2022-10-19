<?php

/**
 * @apiGroup           Authentication
 * @apiName            GoogleLogin
 *
 * @api                {GET} /v1/login/google/redirect Google Login
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\GoogleLoginController;
use Illuminate\Support\Facades\Route;

Route::get('auth/login/google/redirect', [GoogleLoginController::class, 'redirect'])
    ->middleware(['auth:api']);

