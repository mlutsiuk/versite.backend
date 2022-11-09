<?php

namespace App\Containers\AppSection\Invitation\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Invitation\Actions\FindInvitationByIdAction;
use App\Containers\AppSection\Invitation\UI\API\Requests\FindInvitationByIdRequest;
use App\Containers\AppSection\Invitation\UI\API\Transformers\InvitationTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindInvitationByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findInvitationById(FindInvitationByIdRequest $request): array
    {
        $invitation = app(FindInvitationByIdAction::class)->run($request->validated()['id']);

        return $this->transform($invitation, InvitationTransformer::class);
    }
}
