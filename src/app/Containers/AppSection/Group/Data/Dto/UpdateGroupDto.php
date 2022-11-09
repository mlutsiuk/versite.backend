<?php

namespace App\Containers\AppSection\Group\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class UpdateGroupDto extends ParentDto
{
    /**
     * @var string Group title
     */
    public string $title;

    /**
     * @var boolean Is group private (requires invitation to register)
     */
    public bool $is_private;

    /**
     * @var string Registration start for students
     */
    public string $registration_start;    // TODO: ===> Check type

    /**
     * @var string Registration deadline for students
     */
    public string $registration_end;    // TODO: ===> Check type
}
