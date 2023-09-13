<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Model\Customer;
use App\Domain\Repository\CustomerRepositoryInterface;

class InMemoryCustomerRepository implements CustomerRepositoryInterface
{
    private $customers = [];

    public function findByTaxIdentification(string $taxIdentification): ?Customer    
    {
        return $this->customers[$taxIdentification] ?? null;
    }

    public function save(Customer $customer): void
    {
        $this->customers[$customer->getTaxIdentification()] = $customer;
    }

    public function remove(Customer $customer): void
    {
        unset($this->customers[$customer->getTaxIdentification()]);
    }
}