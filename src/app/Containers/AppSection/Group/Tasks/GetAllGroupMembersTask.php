<?php

namespace App\Containers\AppSection\Group\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllGroupMembersTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($group_id): mixed
    {
        return $this->addRequestCriteria()->repository->whereHas('groups', function (Builder $query) use ($group_id) {
            $query->where('groups.id', '=', $group_id);
        })->paginate();
    }
}
