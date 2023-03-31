<?php

namespace App\Containers\AppSection\Student\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class StudentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like'
    ];
}
