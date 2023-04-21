<?php

namespace App\Containers\AppSection\Invitation\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Invitation\Actions\AcceptInvitationAction;
use App\Containers\AppSection\Invitation\UI\API\Requests\AcceptInvitationRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class AcceptInvitationController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function acceptInvitation(AcceptInvitationRequest $request, $id): JsonResponse
    {
        app(AcceptInvitationAction::class)->run($id);

        return $this->noContent();
    }
}
