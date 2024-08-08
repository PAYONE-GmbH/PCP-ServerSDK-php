<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct3392SpecificInput;

/**
 * @description Object containing the specific input details for financing payment methods (Buy Now Pay Later)
 */
class FinancingPaymentMethodSpecificInput
{
    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values. Currently supported payment methods:
     * * 3390 - PAYONE Secured Invoice
     * * 3391 - PAYONE Secured Installment
     * * 3392 - PAYONE Secured Direct Debit
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var ?bool Indicates whether the payment requires approval before the funds will be captured using the Approve payment or Capture payment API.
     */
    #[SerializedName('requiresApproval')]
    protected ?bool $requiresApproval;

    /**
     * @var PaymentProduct3392SpecificInput|null Specific input details for PAYONE Secured Direct Debit.
     */
    #[SerializedName('paymentProduct3392SpecificInput')]
    protected ?PaymentProduct3392SpecificInput $paymentProduct3392SpecificInput;

    public function __construct(
        ?int $paymentProductId = 3390,
        ?bool $requiresApproval = true,
        ?PaymentProduct3392SpecificInput $paymentProduct3392SpecificInput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->requiresApproval = $requiresApproval;
        $this->paymentProduct3392SpecificInput = $paymentProduct3392SpecificInput;
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

    public function getRequiresApproval(): ?bool
    {
        return $this->requiresApproval;
    }

    public function setRequiresApproval(?bool $requiresApproval): self
    {
        $this->requiresApproval = $requiresApproval;
        return $this;
    }

    public function getPaymentProduct3392SpecificInput(): ?PaymentProduct3392SpecificInput
    {
        return $this->paymentProduct3392SpecificInput;
    }

    public function setPaymentProduct3392SpecificInput(?PaymentProduct3392SpecificInput $paymentProduct3392SpecificInput): self
    {
        $this->paymentProduct3392SpecificInput = $paymentProduct3392SpecificInput;
        return $this;
    }
}
