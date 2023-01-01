<?php

namespace RustemKaimolla\KaspiOrdersApi\Enums;

enum OrderState: string
{
    case New           = 'NEW';
    case SignRequired  = 'SIGN_REQUIRED';
    case Pickup        = 'PICKUP';
    case Delivery      = 'DELIVERY';
    case KaspiDelivery = 'KASPI_DELIVERY';
    case Archive       = 'ARCHIVE';

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
            self::New           => 'Новый заказ',
            self::SignRequired  => 'Заказ на подписании',
            self::Pickup        => 'Самовывоз',
            self::Delivery      => 'Доставка',
            self::KaspiDelivery =>'Kaspi Доставка, Kaspi Postomat',
            self::Archive       => 'Архивный заказ',
        };
    }
}
