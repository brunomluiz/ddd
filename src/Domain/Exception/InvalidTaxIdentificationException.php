<?php

namespace App\Domain\Exception;

class InvalidTaxIdentificationException extends CustomerException
{
    public function __construct($message = 'Invalid Tax Identification!', $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}