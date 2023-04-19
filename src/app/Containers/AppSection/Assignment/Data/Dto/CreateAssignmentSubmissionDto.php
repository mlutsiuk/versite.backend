<?php

namespace App\Containers\AppSection\Assignment\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateAssignmentSubmissionDto extends ParentDto
{

    public string $content;
}
