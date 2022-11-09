<?php

namespace App\Containers\AppSection\Invitation\Tasks;

use App\Containers\AppSection\Invitation\Data\Dto\CreateInvitationDto;
use App\Containers\AppSection\Invitation\Data\Repositories\InvitationRepository;
use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotImplementedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateInvitationTask extends ParentTask
{
    public function __construct(
        protected InvitationRepository $repository
    ) {
    }

    /**
     * @param CreateInvitationDto $dto
     * @throws CreateResourceFailedException
     */
    public function run(CreateInvitationDto $dto): Invitation
    {
        try {
            return $this->repository->create([
                'receiver_id' => $dto->receiver_id,
                'group_id' => $dto->group_id
            ]);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
