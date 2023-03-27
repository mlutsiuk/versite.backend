<?php

namespace App\Containers\AppSection\Invitation\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateInvitationDto extends ParentDto
{
    /**
     * @var int Invitation receiver (user)
     */
    public int $receiver_id;

    /**
     * @var int Invitation to student
     */
    public int $student_id;

    /**
     * @var int Invitation to email
     */
    public int $email;
}
