<?php

/**
 * @apiGroup            Group
 * @apiName             GetAllGroupMembers
 *
 * @api                 {GET} /v1/groups/:group_id/members Get All Group Members
 * @apiDescription      Get paginated users that are members(students) of selected group
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 * @apiParam            {String} group_id Group id
 *
 * @apiUse              GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\Group\UI\API\Controllers\GetAllGroupMembersController;
use Illuminate\Support\Facades\Route;

Route::get('groups/{group_id}/members', [GetAllGroupMembersController::class, 'getAllGroupMembers'])
    ->middleware(['auth:api']);

