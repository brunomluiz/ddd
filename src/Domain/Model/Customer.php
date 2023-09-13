<?php

namespace App\Domain\Model;

use App\Domain\Exception\InvalidTaxIdentificationException;
use App\Domain\Service\TaxIdentificationValidator;

class Customer
{
    private $name;
    private $email;
    private $taxIdentification;

    public function __construct(string $name, string $email, string $taxIdentification)
    {
        $this->name = $name;
        $this->email = $email;

        if (!TaxIdentificationValidator::isValid($taxIdentification)) {            
            throw new InvalidTaxIdentificationException();
        }

        $this->taxIdentification = $taxIdentification;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTaxIdentification(): string
    {
        return $this->taxIdentification;
    }
}