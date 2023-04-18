<?php

namespace App\Containers\AppSection\Invitation\UI\API\Controllers;

use App\Containers\AppSection\Invitation\Actions\DeleteInvitationAction;
use App\Containers\AppSection\Invitation\UI\API\Requests\DeleteInvitationRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteInvitationController extends ApiController
{
    /**
     * @param DeleteInvitationRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteInvitation(DeleteInvitationRequest $request, $id): JsonResponse
    {
        app(DeleteInvitationAction::class)->run($id);

        return $this->noContent();
    }
}
