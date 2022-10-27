<?php

namespace App\Containers\AppSection\Authorization\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateRoleDto extends ParentDto
{
    /**
     * @var string Role name
     */
    public string $name;

    /**
     * @var string Role description
     */
    public string $description;

    /**
     * @var string Role display name
     */
    public string $display_name;
}
