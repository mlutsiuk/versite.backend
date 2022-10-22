<?php

namespace App\Containers\AppSection\Authentication\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class PasswordLoginDto extends ParentDto
{
    public string $email;

    public string $password;
}
