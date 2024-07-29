<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct3392SpecificOutput;

/**
 * @description Object containing the specific output details for financing payment methods (Buy Now Pay Later).
 */
class FinancingPaymentMethodSpecificOutput
{
    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     * Currently supported payment methods:
     *  - 3390: PAYONE Secured Invoice
     *  - 3391: PAYONE Secured Installment
     *  - 3392: PAYONE Secured Direct Debit
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var PaymentProduct3391SpecificOutput|null Specific output details for payment product 3391.
     */
    #[SerializedName('paymentProduct3391SpecificOutput')]
    protected ?PaymentProduct3391SpecificOutput $paymentProduct3391SpecificOutput;

    public function __construct(
        ?int $paymentProductId = null,
        ?PaymentProduct3391SpecificOutput $paymentProduct3391SpecificOutput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct3391SpecificOutput = $paymentProduct3391SpecificOutput;
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

    public function getPaymentProduct3391SpecificOutput(): ?PaymentProduct3391SpecificOutput
    {
        return $this->paymentProduct3391SpecificOutput;
    }

    public function setPaymentProduct3391SpecificOutput(?PaymentProduct3391SpecificOutput $paymentProduct3391SpecificOutput): self
    {
        $this->paymentProduct3391SpecificOutput = $paymentProduct3391SpecificOutput;
        return $this;
    }
}
