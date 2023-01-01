<?php

namespace RustemKaimolla\KaspiOrdersApi\Enums;

enum DeliveryType: string
{
    case Pickup   = 'PICKUP';
    case Delivery = 'DELIVERY';

    public function title()
    {
        return match ($this){
            self::Pickup   => 'Самовывоз',
            self::Delivery => 'Доставка',
        };
    }
}
