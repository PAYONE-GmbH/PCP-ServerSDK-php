<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CompletePaymentProduct840Action;

/**
 * @description Object containing the specific input details for PayPal payments completed by the merchant.
 */
class CompletePaymentProduct840SpecificInput
{
    /**
     * @var bool|null Indicates whether the PayPal JavaScript SDK flow is used.
     */
    #[SerializedName('javaScriptSdkFlow')]
    protected ?bool $javaScriptSdkFlow;

    /**
     * @var CompletePaymentProduct840Action|null Confirmation of the order status in case of PayPal SDK integration.
     */
    #[SerializedName('action')]
    protected ?CompletePaymentProduct840Action $action;

    public function __construct(
        ?bool $javaScriptSdkFlow = null,
        ?CompletePaymentProduct840Action $action = null
    ) {
        $this->javaScriptSdkFlow = $javaScriptSdkFlow;
        $this->action = $action;
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

    public function getAction(): ?CompletePaymentProduct840Action
    {
        return $this->action;
    }

    public function setAction(?CompletePaymentProduct840Action $action): self
    {
        $this->action = $action;
        return $this;
    }
}
