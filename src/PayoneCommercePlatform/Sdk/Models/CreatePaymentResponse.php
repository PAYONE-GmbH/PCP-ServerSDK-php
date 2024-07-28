<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentCreationOutput;
use PayoneCommercePlatform\Sdk\Models\MerchantAction;
use PayoneCommercePlatform\Sdk\Models\PaymentResponse;

/**
 * @description Object containing details on the created payment it has directly be executed.
 */
class CreatePaymentResponse
{
    /**
     * @var PaymentCreationOutput|null Details of the created payment.
     */
    #[SerializedName('creationOutput')]
    protected ?PaymentCreationOutput $creationOutput;

    /**
     * @var MerchantAction|null Details of the merchant action.
     */
    #[SerializedName('merchantAction')]
    protected ?MerchantAction $merchantAction;

    /**
     * @var PaymentResponse|null Details of the payment response.
     */
    #[SerializedName('payment')]
    protected ?PaymentResponse $payment;

    /**
     * @var string|null Reference to the paymentExecution.
     */
    #[SerializedName('paymentExecutionId')]
    protected ?string $paymentExecutionId;

    public function __construct(
        ?PaymentCreationOutput $creationOutput = null,
        ?MerchantAction $merchantAction = null,
        ?PaymentResponse $payment = null,
        ?string $paymentExecutionId = null
    ) {
        $this->creationOutput = $creationOutput;
        $this->merchantAction = $merchantAction;
        $this->payment = $payment;
        $this->paymentExecutionId = $paymentExecutionId;
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

    public function getPaymentExecutionId(): ?string
    {
        return $this->paymentExecutionId;
    }

    public function setPaymentExecutionId(?string $paymentExecutionId): self
    {
        $this->paymentExecutionId = $paymentExecutionId;
        return $this;
    }
}
