<?php

namespace App\Containers\AppSection\Course\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CourseRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'title' => 'like',
        'description' => 'like'
    ];
}
