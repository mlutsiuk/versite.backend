<?php

/**
 * @apiGroup           Authentication
 * @apiName            VerifyEmail
 *
 * @api                {POST} /v1/auth/verify/:id/:hash Verify Email
 * @apiDescription     Verify user email
 *
 * Example of a verification email link sent to the user which is used to verify the user `http://versite.test/verify-email/XbPW7awNkzl83LD6/eaabd911e2e07ede6456d3bd5725c6d4a5c2dc0b`
 *
 * Value of `url` query string in the verification link above (sent to the user by email) can be directly used to call the api to verify the user.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiParam           {String} id user id
 * @apiParam           {String} hash a hashed value sent to the user email
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {}
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('auth/verify/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail']);

