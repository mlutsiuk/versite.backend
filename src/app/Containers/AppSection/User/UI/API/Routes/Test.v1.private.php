<?php

/**
 * @apiGroup           User
 * @apiName            Test
 *
 * @api                {GET} /v1/users/test Test
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use Illuminate\Support\Facades\Route;

Route::get('users/test', function () {
    return [
        'hello' => 'world'
    ];
});
