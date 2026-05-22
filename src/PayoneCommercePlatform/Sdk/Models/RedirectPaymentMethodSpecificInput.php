<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\RedirectPaymentProduct840SpecificInput;
use PayoneCommercePlatform\Sdk\Models\RedirectPaymentProduct900SpecificInput;
use PayoneCommercePlatform\Sdk\Models\RedirectionData;

/**
 * @description Object containing the specific input details for payments that involve redirects to 3rd parties to complete, like iDeal and PayPal.
 */
class RedirectPaymentMethodSpecificInput
{
    /**
     * @var bool|null Indicates whether the payment requires approval before the funds will be captured using the Approve payment or Capture payment API.
     */
    #[SerializedName('requiresApproval')]
    protected ?bool $requiresApproval;

    /**
     * @var string|null ID of the token to use to create the payment.
     */
    #[SerializedName('paymentProcessingToken')]
    protected ?string $paymentProcessingToken;

    /**
     * @var string|null Token to identify the card in the reporting.
     */
    #[SerializedName('reportingToken')]
    protected ?string $reportingToken;

    /**
     * @var bool|null Indicates if this transaction should be tokenized.
     */
    #[SerializedName('tokenize')]
    protected ?bool $tokenize;

    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var RedirectPaymentProduct840SpecificInput|null Specific input required for PayPal payments (Payment product ID 840).
     */
    #[SerializedName('paymentProduct840SpecificInput')]
    protected ?RedirectPaymentProduct840SpecificInput $paymentProduct840SpecificInput;

    /**
     * @var RedirectPaymentProduct900SpecificInput|null Specific input required for Wero payments (Payment product ID 900).
     */
    #[SerializedName('paymentProduct900SpecificInput')]
    protected ?RedirectPaymentProduct900SpecificInput $paymentProduct900SpecificInput;

    /**
     * @var RedirectionData|null Redirection data details.
     */
    #[SerializedName('redirectionData')]
    protected ?RedirectionData $redirectionData;

    public function __construct(
        ?bool $requiresApproval = null,
        ?string $paymentProcessingToken = null,
        ?string $reportingToken = null,
        ?bool $tokenize = null,
        ?int $paymentProductId = null,
        ?RedirectPaymentProduct840SpecificInput $paymentProduct840SpecificInput = null,
        ?RedirectPaymentProduct900SpecificInput $paymentProduct900SpecificInput = null,
        ?RedirectionData $redirectionData = null
    ) {
        $this->requiresApproval = $requiresApproval;
        $this->paymentProcessingToken = $paymentProcessingToken;
        $this->reportingToken = $reportingToken;
        $this->tokenize = $tokenize;
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
        $this->paymentProduct900SpecificInput = $paymentProduct900SpecificInput;
        $this->redirectionData = $redirectionData;
    }

    // Getters and Setters
    public function getRequiresApproval(): ?bool
    {
        return $this->requiresApproval;
    }

    public function setRequiresApproval(?bool $requiresApproval): self
    {
        $this->requiresApproval = $requiresApproval;
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

    public function getTokenize(): ?bool
    {
        return $this->tokenize;
    }

    public function setTokenize(?bool $tokenize): self
    {
        $this->tokenize = $tokenize;
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

    public function getPaymentProduct840SpecificInput(): ?RedirectPaymentProduct840SpecificInput
    {
        return $this->paymentProduct840SpecificInput;
    }

    public function setPaymentProduct840SpecificInput(?RedirectPaymentProduct840SpecificInput $paymentProduct840SpecificInput): self
    {
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
        return $this;
    }

    public function getPaymentProduct900SpecificInput(): ?RedirectPaymentProduct900SpecificInput
    {
        return $this->paymentProduct900SpecificInput;
    }

    public function setPaymentProduct900SpecificInput(?RedirectPaymentProduct900SpecificInput $paymentProduct900SpecificInput): self
    {
        $this->paymentProduct900SpecificInput = $paymentProduct900SpecificInput;
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
