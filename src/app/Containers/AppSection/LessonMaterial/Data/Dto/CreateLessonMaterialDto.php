<?php

namespace App\Containers\AppSection\LessonMaterial\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateLessonMaterialDto extends ParentDto
{
    /**
     * @var string Material content
     */
    public string $content;

    /**
     * @var string Material parent course
     */
    public string $course_id;
}
