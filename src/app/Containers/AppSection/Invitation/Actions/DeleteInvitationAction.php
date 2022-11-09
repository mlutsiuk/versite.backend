<?php

namespace App\Containers\AppSection\Invitation\Actions;

use App\Containers\AppSection\Invitation\Tasks\DeleteInvitationTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteInvitationAction extends ParentAction
{
    /**
     * @param $id
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        return app(DeleteInvitationTask::class)->run($id);
    }
}
