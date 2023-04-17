<?php

namespace App\Containers\AppSection\Lesson\Criterias;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Retrieves all entities where $field contains one or more of the given items in $valueString.
 */
class WhereCourseOneOf extends Criteria
{
    public function __construct(
        private readonly array $courses
    ) {
    }

    /**
     * Get all courses where user is author or student
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        /** @var Lesson $model */
        return $model->whereIn('course_id', $this->courses);
    }
}
