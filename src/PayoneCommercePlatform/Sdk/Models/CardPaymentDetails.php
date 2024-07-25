<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Information for card payments realized at a POS.
 */
class CardPaymentDetails
{
    /**
     * @var string|null Reference to the card of the transaction.
     */
    #[SerializedName('maskedCardNumber')]
    protected ?string $maskedCardNumber;

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

    /**
     * @var string|null Identifier for a successful authorization, reversal or refund. Usually provided by the issuer system. Only provided for card payments.
     */
    #[SerializedName('cardAuthorizationId')]
    protected ?string $cardAuthorizationId;

    public function __construct(
        ?string $maskedCardNumber = null,
        ?string $paymentProcessingToken = null,
        ?string $reportingToken = null,
        ?string $cardAuthorizationId = null
    ) {
        $this->maskedCardNumber = $maskedCardNumber;
        $this->paymentProcessingToken = $paymentProcessingToken;
        $this->reportingToken = $reportingToken;
        $this->cardAuthorizationId = $cardAuthorizationId;
    }

    // Getters and Setters
    public function getMaskedCardNumber(): ?string
    {
        return $this->maskedCardNumber;
    }

    public function setMaskedCardNumber(?string $maskedCardNumber): self
    {
        $this->maskedCardNumber = $maskedCardNumber;
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

    public function getCardAuthorizationId(): ?string
    {
        return $this->cardAuthorizationId;
    }

    public function setCardAuthorizationId(?string $cardAuthorizationId): self
    {
        $this->cardAuthorizationId = $cardAuthorizationId;
        return $this;
    }
}
