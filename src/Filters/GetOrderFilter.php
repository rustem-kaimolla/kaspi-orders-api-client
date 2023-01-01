<?php

namespace RustemKaimolla\KaspiOrdersApi\Filters;

use Carbon\Carbon;
use RustemKaimolla\KaspiOrdersApi\Contracts\FilterContract;
use RustemKaimolla\KaspiOrdersApi\Enums\DeliveryType;
use RustemKaimolla\KaspiOrdersApi\Enums\OrderState;
use RustemKaimolla\KaspiOrdersApi\Enums\OrderStatus;

class GetOrderFilter implements FilterContract
{
    public function __construct(
        protected ?OrderStatus  $orderStatus = null,
        protected ?DeliveryType $orderDeliveryType = null,
        protected ?Carbon      $orderCreationDateGreater = null,
        protected ?Carbon      $orderCreationDateLower   = null,
        protected int          $pageNumber = 0,
        protected int          $pageSize = 20,
        protected OrderState   $orderState = OrderState::New,
        protected bool         $signatureRequired = false,
        protected array        $include = ['orders' => 'user'],
    )
    {
        if (empty($this->orderCreationDateGreater)) {
            $this->orderCreationDateGreater = Carbon::now()->addDays(-1);
        }

        if (empty($this->orderCreationDateGreater)) {
            $this->orderCreationDateLower = Carbon::now();
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page' => [
                'number' => $this->pageNumber,
                'size'   => $this->pageSize,
            ],
            'filter' => [
                'orders' => [
                    'state'             => $this->orderState->value,
                    'status'            => $this->orderStatus->value,
                    'deliveryType'      => $this->orderDeliveryType->value,
                    'signatureRequired' => $this->signatureRequired,
                    'creationDate' => [
                        '$ge' => $this->orderCreationDateGreater->getTimestampMs(),
                        '$le' => $this->orderCreationDateLower->getTimestampMs(),
                    ],
                ],
            ],
        ];
    }
}