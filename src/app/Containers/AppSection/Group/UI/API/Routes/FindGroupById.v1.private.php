<?php

/**
 * @apiGroup            Group
 * @apiName             FindGroupById
 *
 * @api                 {GET} /v1/groups/:id Find Group By Id
 *
 * @apiVersion          1.0.0
 * @apiPermission       Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader           {String} accept=application/json
 * @apiHeader           {String} authorization=Bearer
 *
 *
 * @apiUse              GroupSuccessSingleResponse
 */

use App\Containers\AppSection\Group\UI\API\Controllers\FindGroupByIdController;
use Illuminate\Support\Facades\Route;

Route::get('groups/{id}', [FindGroupByIdController::class, 'findGroupById'])
    ->middleware(['auth:api']);

