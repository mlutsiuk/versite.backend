<?php

namespace App\Containers\AppSection\Group\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class GroupRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'title' => 'like',
        'registration_start' => 'like',
        'registration_end' => 'like',
        'created_at' => 'like',
        'updated_at' => 'like'
    ];
}
