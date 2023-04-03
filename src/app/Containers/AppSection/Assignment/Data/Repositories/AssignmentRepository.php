<?php

namespace App\Containers\AppSection\Assignment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class AssignmentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
