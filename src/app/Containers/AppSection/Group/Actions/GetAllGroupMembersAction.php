<?php

namespace App\Containers\AppSection\Group\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Group\Tasks\GetAllGroupMembersTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllGroupMembersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($group_id): mixed
    {
        return app(GetAllGroupMembersTask::class)->run($group_id);
    }
}
