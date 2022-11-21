<?php

namespace App\Containers\AppSection\Achievement\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CourseAchievementRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
