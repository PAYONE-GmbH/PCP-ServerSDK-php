<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CreatePayByLinkRequest
{
    #[SerializedName('paymentLinkSpecificInput')]
    protected PaymentLinkSpecificInput $paymentLinkSpecificInput;
    #[SerializedName('orderType')]
    protected OrderType $orderType;
    /** @var OrderItem[]|null */
    #[SerializedName('items')]
    protected ?array $items;
    #[SerializedName('orderReferences')]
    protected References $orderReferences;

    /** @param OrderItem[]|null $items */
    public function __construct(PaymentLinkSpecificInput $paymentLinkSpecificInput, OrderType $orderType, References $orderReferences, ?array $items = null)
    {
        $this->paymentLinkSpecificInput = $paymentLinkSpecificInput;
        $this->orderType = $orderType;
        $this->orderReferences = $orderReferences;
        $this->items = $items;
    }

    public function getPaymentLinkSpecificInput(): PaymentLinkSpecificInput
    {
        return $this->paymentLinkSpecificInput;
    }
    public function setPaymentLinkSpecificInput(PaymentLinkSpecificInput $paymentLinkSpecificInput): self
    {
        $this->paymentLinkSpecificInput = $paymentLinkSpecificInput;
        return $this;
    }
    public function getOrderType(): OrderType
    {
        return $this->orderType;
    }
    public function setOrderType(OrderType $orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }
    /** @return OrderItem[]|null */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /** @param OrderItem[]|null $items */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
    public function getOrderReferences(): References
    {
        return $this->orderReferences;
    }
    public function setOrderReferences(References $orderReferences): self
    {
        $this->orderReferences = $orderReferences;
        return $this;
    }
}
