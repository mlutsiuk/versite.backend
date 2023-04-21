<?php

namespace App\Containers\AppSection\Invitation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Invitation\Data\Dto\CreateInvitationDto;
use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Containers\AppSection\Invitation\Tasks\AcceptInvitationTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class AcceptInvitationAction extends ParentAction
{
    /**
     * @param CreateInvitationDto $dto
     * @return Invitation
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run($invitationId): Invitation
    {
        return app(AcceptInvitationTask::class)->run($invitationId);
    }
}
