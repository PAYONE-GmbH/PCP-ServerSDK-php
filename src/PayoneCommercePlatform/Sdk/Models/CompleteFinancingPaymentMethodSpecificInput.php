<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct3391SpecificInput;

/**
 * @description To complete the Payment the completeFinancingMethodSpecificInput has to be provided. At the moment it is only available for PAYONE Secured Installment (paymentProductId 3391).
 */
class CompleteFinancingPaymentMethodSpecificInput
{
    /**
     * @var int|null Payment product identifier. Currently supported payment methods:
     * * 3391 - PAYONE Secured Installment
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var bool Indicates whether the payment requires approval before the funds will be captured using the Approve payment or Capture payment API.
     */
    #[SerializedName('requiresApproval')]
    protected bool $requiresApproval;

    /**
     * @var PaymentProduct3391SpecificInput|null Specific input information for PAYONE Secured Installment.
     */
    #[SerializedName('paymentProduct3391SpecificInput')]
    protected ?PaymentProduct3391SpecificInput $paymentProduct3391SpecificInput;

    public function __construct(
        ?int $paymentProductId = 3391,
        bool $requiresApproval = true,
        ?PaymentProduct3391SpecificInput $paymentProduct3391SpecificInput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->requiresApproval = $requiresApproval;
        $this->paymentProduct3391SpecificInput = $paymentProduct3391SpecificInput;
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

    public function getRequiresApproval(): bool
    {
        return $this->requiresApproval;
    }

    public function setRequiresApproval(bool $requiresApproval): self
    {
        $this->requiresApproval = $requiresApproval;
        return $this;
    }

    public function getPaymentProduct3391SpecificInput(): ?PaymentProduct3391SpecificInput
    {
        return $this->paymentProduct3391SpecificInput;
    }

    public function setPaymentProduct3391SpecificInput(?PaymentProduct3391SpecificInput $paymentProduct3391SpecificInput): self
    {
        $this->paymentProduct3391SpecificInput = $paymentProduct3391SpecificInput;
        return $this;
    }
}
