<?php

namespace App\Containers\AppSection\Invitation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Invitation\Data\Repositories\InvitationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetMyInvitationsTask extends ParentTask
{
    public function __construct(
        protected InvitationRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->findWhere(['receiver_id' => auth()->id()]);
    }
}
