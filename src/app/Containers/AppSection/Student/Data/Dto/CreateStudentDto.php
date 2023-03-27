<?php

namespace App\Containers\AppSection\Student\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CreateStudentDto extends ParentDto
{
    /**
     * @var string Student name
     */
    public string $name;

    /**
     * @var string Student course
     */
    public string $course_id;

    /**
     * @var string Linked user account
     */
    public string $user_id;
}
