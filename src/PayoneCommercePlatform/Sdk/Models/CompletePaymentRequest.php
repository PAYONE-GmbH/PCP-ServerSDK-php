<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CompleteFinancingPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\Order;
use PayoneCommercePlatform\Sdk\Models\CustomerDevice;

/**
 * @description The Complete request is the last step to finalize the initially created Payment. It requires the completeFinancingPaymentMethodSpecificInput. The data for the order object should not differ from the previously provided information in Commerce Case, Checkout and Payment, but will not be validated nor automatically loaded from the Commerce Platform.
 */
class CompletePaymentRequest
{
    /**
     * @var CompleteFinancingPaymentMethodSpecificInput|null The specific input for financing payment method.
     */
    #[SerializedName('financingPaymentMethodSpecificInput')]
    protected ?CompleteFinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput;

    /**
     * @var Order|null The order details.
     */
    #[SerializedName('order')]
    protected ?Order $order;

    /**
     * @var CustomerDevice|null The customer device information.
     */
    #[SerializedName('device')]
    protected ?CustomerDevice $device;

    public function __construct(
        ?CompleteFinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput = null,
        ?Order $order = null,
        ?CustomerDevice $device = null
    ) {
        $this->financingPaymentMethodSpecificInput = $financingPaymentMethodSpecificInput;
        $this->order = $order;
        $this->device = $device;
    }

    // Getters and Setters
    public function getFinancingPaymentMethodSpecificInput(): ?CompleteFinancingPaymentMethodSpecificInput
    {
        return $this->financingPaymentMethodSpecificInput;
    }

    public function setFinancingPaymentMethodSpecificInput(?CompleteFinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput): self
    {
        $this->financingPaymentMethodSpecificInput = $financingPaymentMethodSpecificInput;
        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function getDevice(): ?CustomerDevice
    {
        return $this->device;
    }

    public function setDevice(?CustomerDevice $device): self
    {
        $this->device = $device;
        return $this;
    }
}
