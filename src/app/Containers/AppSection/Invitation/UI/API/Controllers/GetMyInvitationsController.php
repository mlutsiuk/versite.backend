<?php

namespace App\Containers\AppSection\Invitation\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Invitation\Actions\GetMyInvitationsAction;
use App\Containers\AppSection\Invitation\UI\API\Requests\GetMyInvitationsRequest;
use App\Containers\AppSection\Invitation\UI\API\Transformers\InvitationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMyInvitationsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getMyInvitations(GetMyInvitationsRequest $request): array
    {
        $invitations = app(GetMyInvitationsAction::class)->run();

        return $this->transform($invitations, InvitationTransformer::class);
    }
}
