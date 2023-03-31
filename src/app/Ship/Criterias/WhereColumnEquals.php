<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Retrieves all entities where $field contains one or more of the given items in $valueString.
 */
class WhereColumnEquals extends Criteria
{
    public function __construct(
        private string $column,
        private string $value
    ) {
    }

    /**
     * Applies the criteria - if more than one value is separated by the configured separator we will "OR" all the params.
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where($this->column, '=', $this->value);
    }
}
