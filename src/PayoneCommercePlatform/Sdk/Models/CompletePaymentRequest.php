<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

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
     * @var CompleteRedirectPaymentMethodSpecificInput|null The specific input for redirect payment method completions.
     */
    #[SerializedName('redirectPaymentMethodSpecificInput')]
    protected ?CompleteRedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput;

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
        ?CompleteRedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput = null,
        ?Order $order = null,
        ?CustomerDevice $device = null
    ) {
        $this->financingPaymentMethodSpecificInput = $financingPaymentMethodSpecificInput;
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
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

    public function getRedirectPaymentMethodSpecificInput(): ?CompleteRedirectPaymentMethodSpecificInput
    {
        return $this->redirectPaymentMethodSpecificInput;
    }

    public function setRedirectPaymentMethodSpecificInput(?CompleteRedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput): self
    {
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
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
