<?php

namespace App\Containers\AppSection\Lesson\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class LessonMaterialRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
