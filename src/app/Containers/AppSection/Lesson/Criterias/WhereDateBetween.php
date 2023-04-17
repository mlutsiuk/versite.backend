<?php

namespace App\Containers\AppSection\Lesson\Criterias;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Retrieves all entities where $field contains one or more of the given items in $valueString.
 */
class WhereDateBetween extends Criteria
{
    public function __construct(
        private readonly string $from,
        private readonly string $to,
    ) {
    }

    /**
     * Get all courses where user is author or student
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        /** @var Lesson $model */
        return $model
            ->where('date', '>=', $this->from)
            ->where('date', '<=', $this->to);
    }
}
