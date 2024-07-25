<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the specific input details for SEPA direct debit payments.
 */
class SepaDirectDebitPaymentMethodSpecificInput
{
    /**
     * @var SepaDirectDebitPaymentProduct771SpecificInput|null Specific input details for SEPA direct debit payment product 771.
     */
    #[SerializedName('paymentProduct771SpecificInput')]
    protected ?SepaDirectDebitPaymentProduct771SpecificInput $paymentProduct771SpecificInput;

    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    public function __construct(
        ?SepaDirectDebitPaymentProduct771SpecificInput $paymentProduct771SpecificInput = null,
        ?int $paymentProductId = null
    ) {
        $this->paymentProduct771SpecificInput = $paymentProduct771SpecificInput;
        $this->paymentProductId = $paymentProductId;
    }

    // Getters and Setters
    public function getPaymentProduct771SpecificInput(): ?SepaDirectDebitPaymentProduct771SpecificInput
    {
        return $this->paymentProduct771SpecificInput;
    }

    public function setPaymentProduct771SpecificInput(?SepaDirectDebitPaymentProduct771SpecificInput $paymentProduct771SpecificInput): self
    {
        $this->paymentProduct771SpecificInput = $paymentProduct771SpecificInput;
        return $this;
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
}
