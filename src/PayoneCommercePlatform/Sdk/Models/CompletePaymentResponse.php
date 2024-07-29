<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentCreationOutput;
use PayoneCommercePlatform\Sdk\Models\MerchantAction;
use PayoneCommercePlatform\Sdk\Models\PaymentResponse;

class CompletePaymentResponse
{
    /**
     * @var PaymentCreationOutput|null Details of the created payment.
     */
    #[SerializedName('creationOutput')]
    protected ?PaymentCreationOutput $creationOutput;

    /**
     * @var MerchantAction|null Action, including the needed data, that you should perform next.
     */
    #[SerializedName('merchantAction')]
    protected ?MerchantAction $merchantAction;

    /**
     * @var PaymentResponse|null Payment related properties.
     */
    #[SerializedName('payment')]
    protected ?PaymentResponse $payment;

    public function __construct(
        ?PaymentCreationOutput $creationOutput = null,
        ?MerchantAction $merchantAction = null,
        ?PaymentResponse $payment = null
    ) {
        $this->creationOutput = $creationOutput;
        $this->merchantAction = $merchantAction;
        $this->payment = $payment;
    }

    // Getters and Setters
    public function getCreationOutput(): ?PaymentCreationOutput
    {
        return $this->creationOutput;
    }

    public function setCreationOutput(?PaymentCreationOutput $creationOutput): self
    {
        $this->creationOutput = $creationOutput;
        return $this;
    }

    public function getMerchantAction(): ?MerchantAction
    {
        return $this->merchantAction;
    }

    public function setMerchantAction(?MerchantAction $merchantAction): self
    {
        $this->merchantAction = $merchantAction;
        return $this;
    }

    public function getPayment(): ?PaymentResponse
    {
        return $this->payment;
    }

    public function setPayment(?PaymentResponse $payment): self
    {
        $this->payment = $payment;
        return $this;
    }
}
