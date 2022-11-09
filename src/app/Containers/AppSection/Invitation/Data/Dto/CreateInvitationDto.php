<?php

namespace App\Containers\AppSection\Invitation\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateInvitationDto extends ParentDto
{
    /**
     * @var int Invitation receiver (student)
     */
    public int $receiver_id;

    /**
     * @var int Invitation target group
     */
    public int $group_id;
}
