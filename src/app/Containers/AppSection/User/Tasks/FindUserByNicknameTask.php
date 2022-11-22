<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindUserByNicknameTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($nickname): User
    {
        $user = $this->repository->findWhere([
            'nickname' => $nickname
        ])->first();

        if(empty($user)) {
            throw new NotFoundException();
        }

        return $user;
    }
}
