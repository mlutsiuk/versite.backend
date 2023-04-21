<?php

namespace App\Containers\AppSection\Invitation\Tasks;

use App\Containers\AppSection\Invitation\Data\Repositories\InvitationRepository;
use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class AcceptInvitationTask extends ParentTask
{
    public function __construct(
        protected InvitationRepository $repository,
        protected StudentRepository    $studentRepository,
    ) {}

    /**
     * @param $invitationId
     * @return Invitation
     * @throws CreateResourceFailedException
     */
    public function run($invitationId): void
    {
        /** @var Invitation $invitation */
        $invitation = $this->repository->find($invitationId);

        $this->studentRepository->update([
            'user_id' => $invitation->receiver_id
        ], $invitation->student_id);

        $invitation->delete();
    }
}
