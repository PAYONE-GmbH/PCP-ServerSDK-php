<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct771SpecificOutput;

/**
 * @description Object containing the SEPA direct debit details.
 */
class SepaDirectDebitPaymentMethodSpecificOutput
{
    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var PaymentProduct771SpecificOutput|null Output that is SEPA Direct Debit specific (i.e. the used mandate).
     */
    #[SerializedName('paymentProduct771SpecificOutput')]
    protected ?PaymentProduct771SpecificOutput $paymentProduct771SpecificOutput;

    public function __construct(
        ?int $paymentProductId = null,
        ?PaymentProduct771SpecificOutput $paymentProduct771SpecificOutput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct771SpecificOutput = $paymentProduct771SpecificOutput;
    }

    // Getters and Setters
    public function getPaymentProductId(): ?int
    {
        return $this->paymentProductId;
    }

    public function setPaymentProductId(?int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }

    public function getPaymentProduct771SpecificOutput(): ?PaymentProduct771SpecificOutput
    {
        return $this->paymentProduct771SpecificOutput;
    }

    public function setPaymentProduct771SpecificOutput(?PaymentProduct771SpecificOutput $paymentProduct771SpecificOutput): self
    {
        $this->paymentProduct771SpecificOutput = $paymentProduct771SpecificOutput;
        return $this;
    }
}
