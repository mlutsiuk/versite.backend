<?php

/**
 * @apiGroup           Authentication
 * @apiName            Logout
 *
 * @api                {DELETE} /v1/auth/logout Logout
 * @apiDescription     User Logout. (Revoking Access Token)
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiSuccessExample  {json}       Success-Response:
HTTP/1.1 202 Accepted
{
    "message": "Token revoked successfully."
}
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::delete('auth/logout', [LogoutController::class, 'logout'])
    ->middleware(['auth:api']);

