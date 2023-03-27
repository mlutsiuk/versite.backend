<?php

namespace App\Containers\AppSection\Student\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class UpdateStudentDto extends ParentDto
{
    /**
     * @var string Student name
     */
    public string $name;
}
