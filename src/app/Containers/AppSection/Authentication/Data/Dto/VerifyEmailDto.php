<?php

namespace App\Containers\AppSection\Authentication\Data\Dto;

use App\Ship\Parents\Dto\Dto as ParentDto;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class VerifyEmailDto extends ParentDto
{
    /**
     * @var int User id
     */
    public int $id;

    /**
     * @var string Hashed user email
     */
    public string $hash;
}
