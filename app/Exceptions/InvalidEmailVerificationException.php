<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;;

class InvalidEmailVerificationException extends HttpException
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(403, 'Your email verification token seems to be invalid.');
    }
}