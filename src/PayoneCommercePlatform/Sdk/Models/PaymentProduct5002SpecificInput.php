<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Specific input details for payment product 5002 (Google Pay).
 */
class PaymentProduct5002SpecificInput
{
    /**
     * @var MobilePaymentNetwork|null The mobile payment network used.
     */
    #[SerializedName('network')]
    protected ?MobilePaymentNetwork $network;

    /**
     * @var string|null The payment checkout data.
     */
    #[SerializedName('paymentCheckoutData')]
    protected ?string $paymentCheckoutData;

    /**
     * @var string|null The source DPA identifier.
     */
    #[SerializedName('srcDpaId')]
    protected ?string $srcDpaId;

    public function __construct(
        ?MobilePaymentNetwork $network = null,
        ?string $paymentCheckoutData = null,
        ?string $srcDpaId = null
    ) {
        $this->network = $network;
        $this->paymentCheckoutData = $paymentCheckoutData;
        $this->srcDpaId = $srcDpaId;
    }

    // Getters and Setters
    public function getNetwork(): ?MobilePaymentNetwork
    {
        return $this->network;
    }

    public function setNetwork(?MobilePaymentNetwork $network): self
    {
        $this->network = $network;
        return $this;
    }

    public function getPaymentCheckoutData(): ?string
    {
        return $this->paymentCheckoutData;
    }

    public function setPaymentCheckoutData(?string $paymentCheckoutData): self
    {
        $this->paymentCheckoutData = $paymentCheckoutData;
        return $this;
    }

    public function getSrcDpaId(): ?string
    {
        return $this->srcDpaId;
    }

    public function setSrcDpaId(?string $srcDpaId): self
    {
        $this->srcDpaId = $srcDpaId;
        return $this;
    }
}
