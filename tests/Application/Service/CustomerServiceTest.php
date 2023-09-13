<?php

use PHPUnit\Framework\TestCase;
use App\Application\Service\CustomerService;
use App\Domain\Model\Customer;
use App\Infrastructure\Persistence\InMemoryCustomerRepository;

class CustomerServiceTest extends TestCase
{
    protected $repository;
    protected $service;
    protected $customer;

    protected function setUp(): void
    {        
        $this->repository = new InMemoryCustomerRepository();
        $this->service = new CustomerService($this->repository);
        $this->customer = $this->service->registerCustomer('Customer Name', 'customer@example.com', '55364454053');
    }

    public function testRegisterCustomerAndPersistInMemory()
    {
        $customer = $this->customer;
        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals('Customer Name', $customer->getName());
        $this->assertEquals('customer@example.com', $customer->getEmail());
    }

    public function testRemoveCustomerFromMemory()
    {
        $this->service->removeCustomer($this->customer);
        $this->assertNull($this->service->findCustomer($this->customer->getTaxIdentification()));
    }
}