<?php

/**
 * @apiGroup            Invitation
 * @apiName             DeleteInvitation
 *
 * @api                 {DELETE} /v1/invitations/:id Delete Invitation
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Invitation id
 *
 * @apiUse              GeneralAcceptedResponse
 */

use App\Containers\AppSection\Invitation\UI\API\Controllers\GetMyInvitationsController;
use Illuminate\Support\Facades\Route;

Route::get('invitations/my', [GetMyInvitationsController::class, 'getMyInvitations'])
    ->middleware(['auth:api']);

