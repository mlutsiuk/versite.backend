<?php

namespace App\Containers\AppSection\Authorization\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class SyncPermissionsOnRoleDto extends ParentDto
{
    /**
     * @var int[] Permissions ids
     */
    public array $permissions_ids;

    /**
     * @var int Role id
     */
    public int $role_id;
}
