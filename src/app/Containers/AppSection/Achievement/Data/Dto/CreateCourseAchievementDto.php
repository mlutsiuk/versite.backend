<?php

namespace App\Containers\AppSection\Achievement\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateCourseAchievementDto extends ParentDto
{
    public string $title;

    public string $description;

    public string $title_color;

    public string $description_color;

    public string $border_color;
}
