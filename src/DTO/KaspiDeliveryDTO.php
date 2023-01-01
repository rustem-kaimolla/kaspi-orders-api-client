<?php

namespace RustemKaimolla\KaspiOrdersApi\DTO;

use Carbon\Carbon;
use RustemKaimolla\KaspiOrdersApi\Contracts\DTOContract;

class KaspiDeliveryDTO implements DTOContract
{
    public ?string $waybill = null;
    public ?Carbon $courierTransmissionDate = null;
    public ?Carbon $courierTransmissionPlanningDate = null;
    public ?string $waybillNumber = null;
    public bool    $express = false;
    public bool    $returnedToWarehouse = false;
    public ?string $firstMileCourier    = null;

    /**
     * @param array $data
     *
     * @return static
     */
    public static function createFromArray(array $data = []): static
    {
        $kaspiDelivery                                  = new static();
        $kaspiDelivery->waybill                         = $data['waybill'] ?? null;
        $kaspiDelivery->courierTransmissionDate         = $data['courierTransmissionDate'] ? Carbon::parse($data['courierTransmissionDate']) : null;
        $kaspiDelivery->courierTransmissionPlanningDate = $data['courierTransmissionPlanningDate'] ? Carbon::parse($data['courierTransmissionPlanningDate']) : null;
        $kaspiDelivery->waybillNumber                   = $data['waybillNumber'] ?? null;
        $kaspiDelivery->express                         = $data['express'] ?? false;
        $kaspiDelivery->returnedToWarehouse             = $data['returnedToWarehouse'] ?? false;
        $kaspiDelivery->firstMileCourier                = $data['firstMileCourier'] ?? null;

        return $kaspiDelivery;
    }
}