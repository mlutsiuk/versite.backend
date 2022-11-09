<?php

/**
 * @apiGroup            Invitation
 * @apiName             FindInvitationById
 *
 * @api                 {GET} /v1/invitations/:id Find Invitation By Id
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

use App\Containers\AppSection\Invitation\UI\API\Controllers\FindInvitationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('invitations/{id}', [FindInvitationByIdController::class, 'findInvitationById'])
    ->middleware(['auth:api']);

