<?php

namespace RustemKaimolla\KaspiOrdersApi\DTO;

use RustemKaimolla\KaspiOrdersApi\Contracts\DTOContract;

class OriginAddressDTO implements DTOContract
{
    /**
     * UUID склада
     *
     * @var string
     */
    public string $id;

    /**
     * Отображаемое название склада
     *
     * @var string
     */
    public string $displayName;

    /**
     * Адрес скалда
     *
     * @var array
     */
    public array  $address;

    /**
     * Город
     *
     * @var array
     */
    public array  $city;

    /**
     * @param array $data
     *
     * @return static
     */
    public static function createFromArray(array $data = []): static
    {
        $originAddress              = new static();
        $originAddress->id          = $data['id'];
        $originAddress->displayName = $data['displayName'];
        $originAddress->address     = $data['address'];
        $originAddress->city        = $data['city'];

        return  $originAddress;
    }
}