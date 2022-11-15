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

use App\Containers\AppSection\Invitation\UI\API\Controllers\DeleteInvitationController;
use Illuminate\Support\Facades\Route;

Route::delete('invitations/{id}', [DeleteInvitationController::class, 'deleteInvitation'])
    ->middleware(['auth:api']);

