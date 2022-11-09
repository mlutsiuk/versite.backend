<?php

namespace App\Containers\AppSection\Invitation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Containers\AppSection\Invitation\Tasks\CreateInvitationTask;
use App\Containers\AppSection\Invitation\Data\Dto\CreateInvitationDto;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateInvitationAction extends ParentAction
{
    /**
     * @param CreateInvitationDto $dto
     * @return Invitation
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateInvitationDto $dto): Invitation
    {
        return app(CreateInvitationTask::class)->run($dto);
    }
}
