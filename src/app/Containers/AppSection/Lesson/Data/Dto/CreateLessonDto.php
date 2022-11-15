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
     * @var string Lesson group
     */
    public string $group_id;

//    /**
//     * @var string Lesson material
//     */
//    public string $material_id;

    /**
     * @var string When lesson are being available to student
     */
    public string $open_at;
}
