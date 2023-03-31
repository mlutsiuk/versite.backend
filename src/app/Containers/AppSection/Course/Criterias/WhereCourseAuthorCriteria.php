<?php

namespace App\Containers\AppSection\Course\Criterias;

use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Retrieves all entities where $field contains one or more of the given items in $valueString.
 */
class WhereCourseAuthorCriteria extends Criteria
{
    public function __construct(
        private readonly string $authorId
    ) {
    }

    /**
     * Applies the criteria - if more than one value is separated by the configured separator we will "OR" all the params.
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        /** @var Course $model */
        return $model->where('author_id', '=', $this->authorId);
    }
}
