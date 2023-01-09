<?php

namespace DTO;

use RustemKaimolla\KaspiOrdersApi\DTO\CustomerDTO;
use PHPUnit\Framework\TestCase;

class CustomerDTOTest extends TestCase
{
    public function testCreateFromArray()
    {
        $sameCustomer = [
            "id"        => "NzQ3OTI4NjQ4Nw",
            "name"      => "Ақтоты",
            "cellPhone" => "7479286487",
            "firstName" => "Ақтоты",
            "lastName"  => "Бұтабай",
        ];

        $customer = CustomerDTO::createFromArray($sameCustomer);

        $this->assertInstanceOf(CustomerDTO::class, $customer);
        $this->assertSame($sameCustomer['id'],        $customer->id);
        $this->assertSame($sameCustomer['name'],      $customer->name);
        $this->assertSame($sameCustomer['cellPhone'], $customer->cellPhone);
        $this->assertSame($sameCustomer['firstName'], $customer->firstName);
        $this->assertSame($sameCustomer['lastName'],  $customer->lastName);
    }
}
