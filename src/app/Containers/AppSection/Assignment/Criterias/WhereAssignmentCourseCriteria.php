<?php

namespace App\Containers\AppSection\Assignment\Criterias;

use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Retrieves all entities where $field contains one or more of the given items in $valueString.
 */
class WhereAssignmentCourseCriteria extends Criteria
{
    public function __construct(
        private readonly string $courseId,
    ) {}

    /**
     * Applies the criteria - if more than one value is separated by the configured separator we will "OR" all the params.
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        /** @var Assignment $model */
        return $model->whereHas('lesson', function ($query) {
            $query->where('course_id', $this->courseId);
        });
    }
}
