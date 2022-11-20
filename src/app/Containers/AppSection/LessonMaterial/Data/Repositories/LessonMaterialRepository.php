<?php

namespace App\Containers\AppSection\LessonMaterial\Data\Repositories;

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
