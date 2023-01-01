<?php

namespace RustemKaimolla\KaspiOrdersApi\Http\Actions;

use RustemKaimolla\KaspiOrdersApi\Contracts\FilterContract;
use RustemKaimolla\KaspiOrdersApi\DTO\OrderDTO;
use RustemKaimolla\KaspiOrdersApi\Http\Client;

class GetOrders extends Client
{
    /**
     * @return array<array-key, OrderDTO>
     *
     * @throws \Throwable
     */
    public function get(FilterContract $filter): array
    {
        return array_map(function (array $order) {
            return OrderDTO::createFromArray($order);
        }, $this->getRequest('orders', $filter->toArray()));
    }
}