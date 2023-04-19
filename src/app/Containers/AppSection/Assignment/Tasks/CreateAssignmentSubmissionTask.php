<?php

namespace App\Containers\AppSection\Assignment\Tasks;

use App\Containers\AppSection\Assignment\Data\Dto\CreateAssignmentSubmissionDto;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentRepository;
use App\Containers\AppSection\Assignment\Data\Repositories\AssignmentSubmissionRepository;
use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Assignment\Models\AssignmentSubmission;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Auth;
use Exception;

class CreateAssignmentSubmissionTask extends ParentTask
{
    public function __construct(
        protected AssignmentSubmissionRepository $repository,
        protected AssignmentRepository $assignmentRepository,
        protected StudentRepository $studentRepository
    ) {}

    /**
     * @throws CreateResourceFailedException
     */
    public function run(CreateAssignmentSubmissionDto $dto, $assignment_id): AssignmentSubmission
    {
        /** @var Assignment $assignment */
        $assignment = $this->assignmentRepository->find($assignment_id);

        /** @var Student $student */
        $student = $this->studentRepository->findWhere([
            'course_id' => $assignment->lesson->course_id,
            'user_id' => Auth::id()
        ])->first();


        try {
            return $this->repository->create([
                'assignment_id' => $assignment_id,
                'content' => $dto->content,
                'student_id' => $student->id
            ]);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
