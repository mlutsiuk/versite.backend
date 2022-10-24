<?php

namespace App\Containers\AppSection\Authentication\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class RegisterUserDto extends ParentDto
{
    /**
     * @var string User full name
     */
    public string $name;

    /**
     * @var string User nickname
     */
    public string $nickname;

    /**
     * @var string User email
     */
    public string $email;

    /**
     * @var string User password
     */
    public string $password;
}
