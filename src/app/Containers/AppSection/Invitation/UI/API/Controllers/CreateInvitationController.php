<?php

namespace App\Containers\AppSection\Invitation\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Invitation\Actions\CreateInvitationAction;
use App\Containers\AppSection\Invitation\Data\Dto\CreateInvitationDto;
use App\Containers\AppSection\Invitation\UI\API\Requests\CreateInvitationRequest;
use App\Containers\AppSection\Invitation\UI\API\Transformers\InvitationTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateInvitationController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createInvitation(CreateInvitationRequest $request): JsonResponse
    {
        $dto = new CreateInvitationDto($request->validated());
        $invitation = app(CreateInvitationAction::class)->run($dto);

        return $this->created($this->transform($invitation, InvitationTransformer::class));
    }
}
