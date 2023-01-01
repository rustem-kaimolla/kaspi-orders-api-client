<?php

namespace RustemKaimolla\KaspiOrdersApi\Enums;

enum PaymentMode: string
{
    case PayWithCredit = 'PAY_WITH_CREDIT';
    case Prepaid = 'PREPAID';

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
            self::PayWithCredit => 'Покупка в кредит',
            self::Prepaid       => 'Безналичная оплата',
        };
    }
}
