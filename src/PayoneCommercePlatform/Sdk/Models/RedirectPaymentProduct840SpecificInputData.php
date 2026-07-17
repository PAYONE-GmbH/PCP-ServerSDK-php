<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RedirectPaymentProduct840SpecificInputData
{
    #[SerializedName('addressSelectionAtPayPal')]
    protected ?bool $addressSelectionAtPayPal;
    #[SerializedName('javaScriptSdkFlow')]
    protected ?bool $javaScriptSdkFlow;

    public function __construct(?bool $addressSelectionAtPayPal = null, ?bool $javaScriptSdkFlow = null)
    {
        $this->addressSelectionAtPayPal = $addressSelectionAtPayPal;
        $this->javaScriptSdkFlow = $javaScriptSdkFlow;
    }

    public function getAddressSelectionAtPayPal(): ?bool
    {
        return $this->addressSelectionAtPayPal;
    }
    public function setAddressSelectionAtPayPal(?bool $addressSelectionAtPayPal): self
    {
        $this->addressSelectionAtPayPal = $addressSelectionAtPayPal;
        return $this;
    }
    public function getJavaScriptSdkFlow(): ?bool
    {
        return $this->javaScriptSdkFlow;
    }
    public function setJavaScriptSdkFlow(?bool $javaScriptSdkFlow): self
    {
        $this->javaScriptSdkFlow = $javaScriptSdkFlow;
        return $this;
    }
}
