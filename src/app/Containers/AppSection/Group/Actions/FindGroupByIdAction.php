<?php

namespace App\Containers\AppSection\Group\Actions;

use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Group\Tasks\FindGroupByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindGroupByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($id): Group
    {
        return app(FindGroupByIdTask::class)->run($id);
    }
}
