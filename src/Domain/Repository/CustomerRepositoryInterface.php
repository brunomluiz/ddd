<?php

namespace App\Domain\Repository;

use App\Domain\Model\Customer;

interface CustomerRepositoryInterface
{
    public function findByTaxIdentification(string $taxIdentification): ?Customer;
    public function save(Customer $customer): void;
    public function remove(Customer $customer): void;
}