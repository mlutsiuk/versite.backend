<?php

namespace App\Containers\AppSection\User\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class UserRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'nickname' => 'like',
        'email' => 'like',
        'email_verified_at' => '=',
        'created_at' => 'like',
    ];

    public function model(): string
    {
        return config('auth.providers.users.model');
    }
}
