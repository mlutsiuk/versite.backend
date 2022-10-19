<?php

/**
 * @apiGroup           Authentication
 * @apiName            VerifyEmail
 *
 * @api                {POST} /v1/verify/:id/:hash Verify Email
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

use App\Containers\AppSection\Authentication\UI\API\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('auth/verify/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail'])
    ->middleware(['auth:api']);

