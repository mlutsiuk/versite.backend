<?php

namespace App\Containers\AppSection\Lesson\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateLessonDto extends ParentDto
{
    /**
     * @var string Lesson title
     */
    public string $title;

    /**
     * @var string Lesson date
     */
    public string $date;

    /**
     * @var string Lesson course
     */
    public string $course_id;
}
