<?php

namespace App\Containers\AppSection\Authentication\Exceptions;

use App\Ship\Parents\Exceptions\Exception as ParentException;
use Symfony\Component\HttpFoundation\Response;

class UnauthenticatedException extends ParentException
{
    protected $code = Response::HTTP_UNAUTHORIZED;
    protected $message = 'User unauthenticated.';
}
