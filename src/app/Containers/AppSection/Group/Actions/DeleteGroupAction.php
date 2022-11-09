<?php

namespace App\Containers\AppSection\Group\Actions;

use App\Containers\AppSection\Group\Tasks\DeleteGroupTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteGroupAction extends ParentAction
{
    /**
     * @param $id
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        return app(DeleteGroupTask::class)->run($id);
    }
}
