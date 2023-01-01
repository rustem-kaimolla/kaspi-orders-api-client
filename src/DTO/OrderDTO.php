<?php

namespace RustemKaimolla\KaspiOrdersApi\DTO;

use Carbon\Carbon;
use RustemKaimolla\KaspiOrdersApi\Contracts\DTOContract;
use RustemKaimolla\KaspiOrdersApi\Enums\DeliveryMode;
use RustemKaimolla\KaspiOrdersApi\Enums\OrderState;
use RustemKaimolla\KaspiOrdersApi\Enums\OrderStatus;
use RustemKaimolla\KaspiOrdersApi\Enums\PaymentMode;

class OrderDTO implements DTOContract
{
    /**
     * @var string
     */
    public string $type = 'orders';

    /**
     * UUID заказа в системе  Kaspi
     *
     * @var string
     */
    public string $id;

    /**
     * код заказа
     *
     * @var string
     */
    public string $code;

    /**
     * общая сумма заказа в тенге
     *
     * @var float
     */
    public float $totalPrice;

    /**
     * способ оплаты заказа
     *
     * @var PaymentMode
     */
    public PaymentMode $paymentMode = PaymentMode::Prepaid;

    /**
     * Склад
     *
     * @var OriginAddressDTO
     */
    public OriginAddressDTO $originAddress;

    /**
     * дата доставки в миллисекундах
     *
     * @var Carbon
     */
    public Carbon $plannedDeliveryDate;

    /**
     * дата доставки в миллисекундах
     *
     * @var Carbon
     */
    public ?Carbon $reservationDate;

    /**
     * дата создания заказа в миллисекундах
     *
     * @var Carbon
     */
    public Carbon $creationDate;

    /**
     * стоимость доставки для продавца
     *
     * @var float
     */
    public float $deliveryCostForSeller = 0.0;

    /**
     * Признаки Kaspi Доставки
     *
     * @var bool
     */
    public bool $isKaspiDelivery = true;

    /**
     * способ осуществляемой доставки
     *
     * @var DeliveryMode
     */
    public DeliveryMode $deliveryMode = DeliveryMode::DeliveryPickup;

    /**
     * булевое значение, указывает на необходимость подписания кредита
     *
     * @var bool
     */
    public bool $signatureRequired = false;

    /**
     * булевое значение, указывает является ли заказ по Kaspi Доставке или нет
     *
     * @var KaspiDeliveryDTO|null
     */
    public ?KaspiDeliveryDTO $kaspiDelivery;

    /**
     * булевое значение, является ли заказ предзаказом или нет
     *
     * @var bool
     */
    public bool $preOrder = false;

    /**
     * ID пункта вызвоза
     *
     * @var string
     */
    public string $pickupPointId;

    /**
     * состояние заказа
     *
     * @var OrderState
     */
    public OrderState $state = OrderState::New;

    /**
     * собран ли заказ
     *
     * @var bool
     */
    public bool $assembled = false;

    /**
     * дата одобрения заказа банком в миллисекундах
     *
     * @var Carbon
     */
    public Carbon $approvedByBankDate;

    /**
     * статус заказа
     *
     * @var OrderStatus
     */
    public OrderStatus $status;

    /**
     * клиент, совершивший заказ. Содержит в себе имя, фамилию и номер телефона
     *
     * @var CustomerDTO
     */
    public CustomerDTO $customer;

    /**
     * стоимость доставки
     *
     * @var float
     */
    public float $deliveryCost = 0.0;

    /**
     * @param array $data
     *
     * @return static
     */
    public static function createFromArray(array $data = []): static
    {
        $order                      = new static();
        $order->type                = $data['type'];
        $order->id                  = $data['id'];
        $order->code                = $data['attributes']['code'];
        $order->totalPrice          = $data['attributes']['totalPrice'];
        $order->paymentMode         = PaymentMode::tryFrom($data['attributes']['paymentMode']);
        $order->originAddress       = OriginAddressDTO::createFromArray($data['attributes']['originAddress']);
        $order->plannedDeliveryDate = Carbon::parse($data['attributes']['plannedDeliveryDate']);
        $order->reservationDate     = Carbon::parse($data['attributes']['reservationDate']) ?? null;
        $order->creationDate        = Carbon::parse($data['attributes']['creationDate']);
        $order->deliveryCost        = $data['attributes']['deliveryCostForSeller'];
        $order->isKaspiDelivery     = $data['attributes']['isKaspiDelivery'];
        $order->deliveryMode        = DeliveryMode::tryFrom($data['attributes']['deliveryMode']);
        $order->signatureRequired   = $data['attributes']['signatureRequired'];
        $order->kaspiDelivery       = KaspiDeliveryDTO::createFromArray($data['attributes']['kaspiDelivery']);
        $order->preOrder            = $data['attributes']['preOrder'];
        $order->pickupPointId       = $data['attributes']['pickupPointId'];
        $order->state               = OrderState::tryFrom($data['attributes']['state']);
        $order->assembled           = $data['attributes']['assembled'];
        $order->approvedByBankDate  = Carbon::parse($data['attributes']['approvedByBankDate']);
        $order->status              = OrderStatus::tryFrom($data['attributes']['status']);
        $order->customer            = CustomerDTO::createFromArray($data['attributes']['customer']);
        $order->deliveryCost        = $data['attributes']['deliveryCost'];

        return $order;
    }
}