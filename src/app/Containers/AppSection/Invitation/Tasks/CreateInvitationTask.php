<?php

namespace App\Containers\AppSection\Invitation\Tasks;

use App\Containers\AppSection\Invitation\Data\Dto\CreateInvitationDto;
use App\Containers\AppSection\Invitation\Data\Repositories\InvitationRepository;
use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateInvitationTask extends ParentTask
{
    public function __construct(
        protected InvitationRepository $repository,
        protected UserRepository $userRepository
    ) {
    }

    /**
     * @param CreateInvitationDto $dto
     * @throws CreateResourceFailedException
     */
    public function run(CreateInvitationDto $dto): Invitation
    {
        $existingReceiver = $this->userRepository->findWhere([
            'email' => $dto->email
        ])->first();

        try {
            if(!empty($existingReceiver)) {
                return $this->repository->create([
                    'student_id' => $dto->student_id,
                    'receiver_id' => $existingReceiver->id,
                    'is_hidden' => false
                ]);
            }
            else {
                return $this->repository->create([
                    'student_id' => $dto->student_id,
                    'email' => $dto->email,
                    'is_hidden' => false
                ]);
            }
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
