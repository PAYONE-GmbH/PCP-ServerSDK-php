<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class RedirectPaymentMethodSpecificOutputForCreateIntent
{
    #[SerializedName('requiresApproval')]
    protected ?bool $requiresApproval;
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;
    #[SerializedName('paymentProduct840SpecificOutput')]
    protected ?RedirectPaymentProduct840SpecificInputData $paymentProduct840SpecificOutput;
    #[SerializedName('redirectionData')]
    protected ?RedirectionData $redirectionData;

    public function __construct(?bool $requiresApproval = null, ?int $paymentProductId = null, ?RedirectPaymentProduct840SpecificInputData $paymentProduct840SpecificOutput = null, ?RedirectionData $redirectionData = null)
    {
        $this->requiresApproval = $requiresApproval;
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct840SpecificOutput = $paymentProduct840SpecificOutput;
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
    public function getPaymentProduct840SpecificOutput(): ?RedirectPaymentProduct840SpecificInputData
    {
        return $this->paymentProduct840SpecificOutput;
    }
    public function setPaymentProduct840SpecificOutput(?RedirectPaymentProduct840SpecificInputData $paymentProduct840SpecificOutput): self
    {
        $this->paymentProduct840SpecificOutput = $paymentProduct840SpecificOutput;
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
