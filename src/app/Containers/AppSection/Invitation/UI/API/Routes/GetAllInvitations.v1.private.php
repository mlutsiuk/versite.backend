<?php

/**
 * @apiGroup            Invitation
 * @apiName             GetAllInvitations
 *
 * @api                 {GET} /v1/invitations Get All Invitations
 * @apiDescription      Endpoint description here...
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} parameters here...
 *
 * @apiSuccessExample   {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Invitation\UI\API\Controllers\GetAllInvitationsController;
use Illuminate\Support\Facades\Route;

Route::get('invitations', [GetAllInvitationsController::class, 'getAllInvitations'])
    ->middleware(['auth:api']);

