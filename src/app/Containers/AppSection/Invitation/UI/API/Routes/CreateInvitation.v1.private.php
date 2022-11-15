<?php

/**
 * @apiGroup            Invitation
 * @apiName             CreateInvitation
 *
 * @api                 {POST} /v1/invitations Create Invitation
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiBody             {String} receiver_id Invitation receiver (student)
 * @apiBody             {String} group_id Invitation target group
 *
 * @apiUse              InvitationSuccessSingleResponse
 */

use App\Containers\AppSection\Invitation\UI\API\Controllers\CreateInvitationController;
use Illuminate\Support\Facades\Route;

Route::post('invitations', [CreateInvitationController::class, 'createInvitation'])
    ->middleware(['auth:api']);

