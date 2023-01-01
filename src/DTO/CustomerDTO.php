<?php

namespace RustemKaimolla\KaspiOrdersApi\DTO;

use RustemKaimolla\KaspiOrdersApi\Contracts\DTOContract;

class CustomerDTO implements DTOContract
{
    public string $id;
    public string $name;
    public string $cellPhone;
    public string $firstName;
    public string $lastName;

    /**
     * @param array $data
     *
     * @return static
     */
    public static function createFromArray(array $data = []): static
    {
        $customer            = new static();
        $customer->id        = $data['id'];
        $customer->name      = $data['name'];
        $customer->cellPhone = $data['cellPhone'];
        $customer->firstName = $data['firstName'];
        $customer->lastName  = $data['lastName'];

        return $customer;
    }
}