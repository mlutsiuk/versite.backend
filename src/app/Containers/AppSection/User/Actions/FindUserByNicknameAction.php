<?php

namespace App\Containers\AppSection\User\Actions;
;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\FindUserByNicknameTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindUserByNicknameAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run($nickname): User
    {
        return app(FindUserByNicknameTask::class)->run($nickname);
    }
}
