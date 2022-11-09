<?php

namespace App\Containers\AppSection\Authorization\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class SyncUserRolesDto extends ParentDto
{
    /**
     * @var int[] Roles ids
     */
    public array $roles_ids;

    /**
     * @var int User id
     */
    public int $user_id;
}