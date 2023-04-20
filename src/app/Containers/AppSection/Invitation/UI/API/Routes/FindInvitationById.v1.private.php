<?php

/**
 * @apiGroup            Invitation
 * @apiName             FindInvitationById
 *
 * @api                 {GET} /v1/invitations/:id Find Invitation By Id
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} id Invitation id.
 *
 * @apiUse              InvitationSuccessSingleResponse
 */

use App\Containers\AppSection\Invitation\UI\API\Controllers\FindInvitationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('invitations/{id}', [FindInvitationByIdController::class, 'findInvitationById'])
    ->where('id', '^(?!.*\b(my)\b)[a-zA-Z0-9 ]+$')
    ->middleware(['auth:api']);

