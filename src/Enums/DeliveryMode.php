<?php

namespace RustemKaimolla\KaspiOrdersApi\Enums;

enum DeliveryMode: string
{
    case DeliveryPickup = 'DELIVERY_PICKUP';
    case DeliveryRegionalToDoor = 'DELIVERY_REGIONAL_TODOOR';

    public function title()
    {
        return match ($this){
            self::DeliveryPickup => 'Kaspi Postomat',
            self::DeliveryRegionalToDoor => 'Kaspi Доставка',
        };
    }
}
