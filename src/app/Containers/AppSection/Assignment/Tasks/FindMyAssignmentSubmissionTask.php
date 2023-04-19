<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentSubmissionRepository;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Auth;

class FindMyAssignmentSubmissionTask extends ParentTask
{
    public function __construct(
        protected AssignmentSubmissionRepository $repository,
        protected AssignmentRepository $assignmentRepository,
        protected StudentRepository $studentRepository
    ) {}

    /**
     * @throws CreateResourceFailedException
     */
    public function run($assignment_id)
    {
        /** @var Assignment $assignment */
        $assignment = $this->assignmentRepository->find($assignment_id);

        /** @var Student $student */
        $student = $this->studentRepository->findWhere([
            'course_id' => $assignment->lesson->course_id,
            'user_id' => Auth::id()
        ])->first();


        return $this->repository->findWhere([
            'assignment_id' => $assignment_id,
            'student_id' => $student->id
        ])->first();
    }
}
