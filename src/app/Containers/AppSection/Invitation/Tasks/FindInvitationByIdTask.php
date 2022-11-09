<?php

namespace App\Containers\AppSection\Invitation\Tasks;

use App\Containers\AppSection\Invitation\Data\Repositories\InvitationRepository;
use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindInvitationByIdTask extends ParentTask
{
    public function __construct(
        protected InvitationRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Invitation
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
