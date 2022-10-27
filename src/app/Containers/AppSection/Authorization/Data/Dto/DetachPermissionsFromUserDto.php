<?php

namespace App\Containers\AppSection\Authorization\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class DetachPermissionsFromUserDto extends ParentDto
{
    /**
     * @var int[] Permissions ids
     */
    public array $permissions_ids;

    /**
     * @var int User id
     */
    public int $user_id;
}
