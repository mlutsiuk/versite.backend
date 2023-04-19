<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentSubmissionRepository;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Assignment\Models\AssignmentSubmission;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindMyAssignmentSubmissionTask extends ParentTask
{
    public function __construct(
        protected AssignmentSubmissionRepository $repository,
        protected AssignmentRepository           $assignmentRepository,
        protected StudentRepository              $studentRepository
    ) {}

    /**
     * @param $assignment_id
     * @return AssignmentSubmission|mixed
     */
    public function run($assignment_id)
    {
        /** @var Assignment $assignment */
        $assignment = $this->assignmentRepository->find($assignment_id);

        return $assignment->mySubmission;
    }
}
