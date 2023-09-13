<?php

namespace App\Application\Service;

use App\Domain\Model\Customer;
use App\Domain\Repository\CustomerRepositoryInterface;

class CustomerService
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function registerCustomer(string $name, string $email, string $taxIdentification): Customer
    {
        $customer = new Customer($name, $email, $taxIdentification);
        $this->customerRepository->save($customer);
        return $customer;
    }

    public function findCustomer(string $taxIdentification): ?Customer
    {
        return $this->customerRepository->findByTaxIdentification($taxIdentification);
    }

    public function removeCustomer(Customer $customer)
    {
        return $this->customerRepository->remove($customer);
    }
}