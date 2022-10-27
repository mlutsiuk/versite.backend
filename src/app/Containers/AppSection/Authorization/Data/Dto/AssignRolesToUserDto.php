<?php

namespace App\Containers\AppSection\Authorization\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class AssignRolesToUserDto extends ParentDto
{
    /**
     * @var int[] Roles ids
     */
    public array $roles_ids;

    /**
     * @var string User id
     */
    public string $user_id;
}
