<?php

namespace DTO;

use Carbon\Carbon;
use RustemKaimolla\KaspiOrdersApi\DTO\KaspiDeliveryDTO;
use PHPUnit\Framework\TestCase;

class KaspiDeliveryDTOTest extends TestCase
{

    public function testCreateFromArray()
    {
        $delivery = [
            'waybill' => "https://cdnkaspi.kz/waybills/awb5veyvsdsdbgdfs.pdf",
            'courierTransmissionDate' => '2020-09-01 10:00:00',
            'courierTransmissionPlanningDate' => '2020-09-01 12:00:00',
            'waybillNumber' => '123456',
            'express' => true,
            'returnedToWarehouse' => false,
            'firstMileCourier' => 'Fedex',
        ];

        $deliveryDTO = KaspiDeliveryDTO::createFromArray($delivery);

        $this->assertEquals($delivery['waybill'], $deliveryDTO->waybill);
        $this->assertEquals(new Carbon($delivery['courierTransmissionDate']), $deliveryDTO->courierTransmissionDate);
        $this->assertEquals(new Carbon($delivery['courierTransmissionPlanningDate']), $deliveryDTO->courierTransmissionPlanningDate);
        $this->assertEquals($delivery['waybillNumber'], $deliveryDTO->waybillNumber);
        $this->assertEquals($delivery['express'], $deliveryDTO->express);
        $this->assertEquals($delivery['returnedToWarehouse'], $deliveryDTO->returnedToWarehouse);
        $this->assertEquals($delivery['firstMileCourier'], $deliveryDTO->firstMileCourier);
    }
}
