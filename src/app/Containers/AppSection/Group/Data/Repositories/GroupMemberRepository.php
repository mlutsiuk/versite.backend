<?php

namespace App\Containers\AppSection\Group\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class GroupMemberRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
        'group_id' => '='
    ];
}
