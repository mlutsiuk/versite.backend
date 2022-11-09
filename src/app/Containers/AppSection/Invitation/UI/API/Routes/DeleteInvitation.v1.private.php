<?php

/**
 * @apiGroup            Invitation
 * @apiName             DeleteInvitation
 *
 * @api                 {DELETE} /v1/invitations/:id Delete Invitation
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

use App\Containers\AppSection\Invitation\UI\API\Controllers\DeleteInvitationController;
use Illuminate\Support\Facades\Route;

Route::delete('invitations/{id}', [DeleteInvitationController::class, 'deleteInvitation'])
    ->middleware(['auth:api']);

