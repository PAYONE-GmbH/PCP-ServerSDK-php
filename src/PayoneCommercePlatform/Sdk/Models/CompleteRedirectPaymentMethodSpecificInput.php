<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the redirect payment product details.
 */
class CompleteRedirectPaymentMethodSpecificInput
{
    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var CompletePaymentProduct840SpecificInput|null PayPal (payment product 840) specific details for completions.
     */
    #[SerializedName('paymentProduct840SpecificInput')]
    protected ?CompletePaymentProduct840SpecificInput $paymentProduct840SpecificInput;

    public function __construct(
        ?int $paymentProductId = null,
        ?CompletePaymentProduct840SpecificInput $paymentProduct840SpecificInput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
    }

    public function getPaymentProductId(): ?int
    {
        return $this->paymentProductId;
    }

    public function setPaymentProductId(?int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }

    public function getPaymentProduct840SpecificInput(): ?CompletePaymentProduct840SpecificInput
    {
        return $this->paymentProduct840SpecificInput;
    }

    public function setPaymentProduct840SpecificInput(?CompletePaymentProduct840SpecificInput $paymentProduct840SpecificInput): self
    {
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
        return $this;
    }
}
