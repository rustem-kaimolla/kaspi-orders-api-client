<?php

namespace RustemKaimolla\KaspiOrdersApi\Enums;

enum OrderStatus:string
{
    case ApprovedByBank               = 'APPROVED_BY_BANK';
    case AcceptedByMerchant           = 'ACCEPTED_BY_MERCHANT';
    case Completed                    = 'COMPLETED';
    case Cancelled                    = 'CANCELLED';
    case Cancelling                   = 'CANCELLING';
    case KaspiDeliveryReturnRequested = 'KASPI_DELIVERY_RETURN_REQUESTED';
    case ReturnAcceptedByMerchant     = 'RETURN_ACCEPTED_BY_MERCHANT';
    case Returned                     = 'RETURNED';

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
          self::ApprovedByBank               => 'Одобрен банком',
          self::AcceptedByMerchant           => 'Принят на обработку продавцом',
          self::Completed                    => 'Завершён',
          self::Cancelled                    => 'Отменён',
          self::Cancelling                   => 'Ожидает отмены',
          self::KaspiDeliveryReturnRequested => 'Ожидает возврата',
          self::ReturnAcceptedByMerchant     => 'Ожидает решения по возврату',
          self::Returned                     => 'Возвращён',
        };
    }
}
