<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;
use Hash;

class HashPasswordTask extends ParentTask
{
    /**
     * Hash user password
     *
     * @param string $password Password to hash
     * @return string
     */
    public function run(string $password): string
    {
        return Hash::make($password);
    }
}
