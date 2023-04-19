<?php

namespace App\Containers\AppSection\Assignment\Data\Repositories;

use App\Containers\AppSection\Assignment\Models\AssignmentSubmission;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class AssignmentSubmissionRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

    public function model(): string
    {
        return AssignmentSubmission::class;
    }
}
