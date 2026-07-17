<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class RedirectPaymentMethodSpecificInputForIntent
{
    #[SerializedName('requiresApproval')]
    protected ?bool $requiresApproval;
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;
    #[SerializedName('paymentProduct840SpecificInput')]
    protected ?RedirectPaymentProduct840SpecificInputData $paymentProduct840SpecificInput;
    #[SerializedName('redirectionData')]
    protected ?RedirectionData $redirectionData;

    public function __construct(?bool $requiresApproval = null, ?int $paymentProductId = null, ?RedirectPaymentProduct840SpecificInputData $paymentProduct840SpecificInput = null, ?RedirectionData $redirectionData = null)
    {
        $this->requiresApproval = $requiresApproval;
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
        $this->redirectionData = $redirectionData;
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
    public function getPaymentProductId(): ?int
    {
        return $this->paymentProductId;
    }
    public function setPaymentProductId(?int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }
    public function getPaymentProduct840SpecificInput(): ?RedirectPaymentProduct840SpecificInputData
    {
        return $this->paymentProduct840SpecificInput;
    }
    public function setPaymentProduct840SpecificInput(?RedirectPaymentProduct840SpecificInputData $paymentProduct840SpecificInput): self
    {
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
        return $this;
    }
    public function getRedirectionData(): ?RedirectionData
    {
        return $this->redirectionData;
    }
    public function setRedirectionData(?RedirectionData $redirectionData): self
    {
        $this->redirectionData = $redirectionData;
        return $this;
    }
}
