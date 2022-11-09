<?php

namespace App\Containers\AppSection\Group\UI\API\Controllers;

use App\Containers\AppSection\Group\Actions\DeleteGroupAction;
use App\Containers\AppSection\Group\UI\API\Requests\DeleteGroupRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteGroupController extends ApiController
{
    /**
     * @param DeleteGroupRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteGroup(DeleteGroupRequest $request): JsonResponse
    {
        app(DeleteGroupAction::class)->run($request->validated()['id']);

        return $this->noContent();
    }
}
