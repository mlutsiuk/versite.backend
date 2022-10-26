<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class HashEmailTask extends ParentTask
{
    /**
     * @param string $email Email to hash
     * @return string Hashed email
     */
    public function run(string $email): string
    {
        return sha1($email);
    }
}
