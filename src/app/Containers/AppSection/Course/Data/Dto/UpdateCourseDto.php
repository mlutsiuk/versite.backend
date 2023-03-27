<?php

namespace App\Containers\AppSection\Course\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class UpdateCourseDto extends ParentDto
{
    /**
     * @var string Course title
     */
    public string $title;

    /**
     * @var string Course description
     */
    public string $description;
}
