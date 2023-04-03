<?php

namespace App\Containers\AppSection\Assignment\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class UpdateAssignmentDto extends ParentDto
{
    public string $title;
    public ?string $description;
    public ?string $max_mark;
    public ?string $deadline;
}
