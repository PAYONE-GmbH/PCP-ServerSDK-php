<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the redirect payment product details.
 */
class RedirectPaymentMethodSpecificOutput
{
    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var PaymentProduct840SpecificOutput|null PayPal (payment product 840) specific details.
     */
    #[SerializedName('paymentProduct840SpecificOutput')]
    protected ?PaymentProduct840SpecificOutput $paymentProduct840SpecificOutput;

    /**
     * @var string|null ID of the token. This property is populated when the payment was done with a token.
     */
    #[SerializedName('paymentProcessingToken')]
    protected ?string $paymentProcessingToken;

    /**
     * @var string|null Token to identify the card in the reporting.
     */
    #[SerializedName('reportingToken')]
    protected ?string $reportingToken;

    public function __construct(
        ?int $paymentProductId = null,
        ?PaymentProduct840SpecificOutput $paymentProduct840SpecificOutput = null,
        ?string $paymentProcessingToken = null,
        ?string $reportingToken = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct840SpecificOutput = $paymentProduct840SpecificOutput;
        $this->paymentProcessingToken = $paymentProcessingToken;
        $this->reportingToken = $reportingToken;
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

    public function getPaymentProduct840SpecificOutput(): ?PaymentProduct840SpecificOutput
    {
        return $this->paymentProduct840SpecificOutput;
    }

    public function setPaymentProduct840SpecificOutput(?PaymentProduct840SpecificOutput $paymentProduct840SpecificOutput): self
    {
        $this->paymentProduct840SpecificOutput = $paymentProduct840SpecificOutput;
        return $this;
    }

    public function getPaymentProcessingToken(): ?string
    {
        return $this->paymentProcessingToken;
    }

    public function setPaymentProcessingToken(?string $paymentProcessingToken): self
    {
        $this->paymentProcessingToken = $paymentProcessingToken;
        return $this;
    }

    public function getReportingToken(): ?string
    {
        return $this->reportingToken;
    }

    public function setReportingToken(?string $reportingToken): self
    {
        $this->reportingToken = $reportingToken;
        return $this;
    }
}
