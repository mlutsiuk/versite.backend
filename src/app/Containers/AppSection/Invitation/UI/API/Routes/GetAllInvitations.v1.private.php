<?php

/**
 * @apiGroup            Invitation
 * @apiName             GetAllInvitations
 *
 * @api                 {GET} /v1/invitations Get All Invitations
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiUse              GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\Invitation\UI\API\Controllers\GetAllInvitationsController;
use Illuminate\Support\Facades\Route;

Route::get('invitations', [GetAllInvitationsController::class, 'getAllInvitations'])
    ->middleware(['auth:api']);

