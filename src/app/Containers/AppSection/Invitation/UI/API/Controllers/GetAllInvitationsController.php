<?php

namespace App\Containers\AppSection\Invitation\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Invitation\Actions\GetAllInvitationsAction;
use App\Containers\AppSection\Invitation\UI\API\Requests\GetAllInvitationsRequest;
use App\Containers\AppSection\Invitation\UI\API\Transformers\InvitationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllInvitationsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllInvitations(GetAllInvitationsRequest $request): array
    {
        $invitations = app(GetAllInvitationsAction::class)->run();

        return $this->transform($invitations, InvitationTransformer::class);
    }
}
