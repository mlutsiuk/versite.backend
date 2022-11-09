<?php

namespace App\Containers\AppSection\Invitation\Actions;

use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Containers\AppSection\Invitation\Tasks\FindInvitationByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindInvitationByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): Invitation
    {
        return app(FindInvitationByIdTask::class)->run($id);
    }
}
