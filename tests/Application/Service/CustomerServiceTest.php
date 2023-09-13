<?php

use PHPUnit\Framework\TestCase;
use App\Application\Service\CustomerService;
use App\Domain\Model\Customer;
use App\Infrastructure\Persistence\InMemoryCustomerRepository;

class CustomerServiceTest extends TestCase
{
    public function testRegisterCustomerAndPersistInMemory()
    {
        $repository = new InMemoryCustomerRepository();

        $service = new CustomerService($repository);        
        $customer = $service->registerCustomer('Customer Name', 'customer@example.com', '55364454053');

        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals('Customer Name', $customer->getName());
        $this->assertEquals('customer@example.com', $customer->getEmail());
    }

    public function testRemoveCustomerFromMemory()
    {
        $repository = new InMemoryCustomerRepository();

        $service = new CustomerService($repository);        
        $customer = $service->registerCustomer('Customer Name', 'customer@example.com', '55364454053');
        $service->removeCustomer($customer);
        $this->assertNull($service->findCustomer($customer->getTaxIdentification()));
    }
}