<?php

namespace App\Tests\Domain\Model;

use PHPUnit\Framework\TestCase;
use App\Domain\Model\Customer;
use App\Domain\Exception\InvalidTaxIdentificationException;

class CustomerTest extends TestCase
{
    public function testValidCustomerCreation()
    {
        $customer = new Customer('Customer Name', 'customer@example.com', '55364454053');
        
        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals('Customer Name', $customer->getName());
        $this->assertEquals('customer@example.com', $customer->getEmail());
        $this->assertEquals('55364454053', $customer->getTaxIdentification());
    }

    public function testInvalidTaxIdentificationThrowsException()
    {
        $this->expectException(InvalidTaxIdentificationException::class);
        
        new Customer('Invalid Customer', 'invalid@example.com', '11111111111');
    }
}