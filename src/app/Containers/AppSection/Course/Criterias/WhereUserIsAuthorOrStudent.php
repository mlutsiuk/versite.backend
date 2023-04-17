<?php

namespace App\Containers\AppSection\Course\Criterias;

use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Retrieves all entities where $field contains one or more of the given items in $valueString.
 */
class WhereUserIsAuthorOrStudent extends Criteria
{
    public function __construct(
        private readonly string $userId
    ) {
    }

    /**
     * Get all courses where user is author or student
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        /** @var Course $model */
        return $model->where('author_id', $this->userId)
            ->orWhereHas('students', function ($query) {
                $query->where('user_id', $this->userId);
            });
    }
}
