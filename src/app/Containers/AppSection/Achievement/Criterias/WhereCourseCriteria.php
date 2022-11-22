<?php

namespace App\Containers\AppSection\Achievement\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WhereCourseCriteria extends Criteria
{
    public function __construct(
        private $courseId
    ) {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('course_id', $this->courseId);
    }
}
