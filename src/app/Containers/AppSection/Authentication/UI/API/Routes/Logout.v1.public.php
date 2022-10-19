<?php

/**
 * @apiGroup           Authentication
 * @apiName            Logout
 *
 * @api                {DELETE} /v1/logout Logout
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

use App\Containers\AppSection\Authentication\UI\API\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::delete('auth/logout', [LogoutController::class, 'logout'])
    ->middleware(['auth:api']);

