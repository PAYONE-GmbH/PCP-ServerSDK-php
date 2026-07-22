<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class ApplePaymentDataTokenHeaderInformation
{
    /**
     * @var string A hexadecimal Transaction identifier identifier as a string.
     */
    #[SerializedName('transactionId')]
    protected string $transactionId;

    /**
     * @var string|null SHA-256 hash, hex encoded as a string. Hash of the applicationData property of the original PKPaymentRequest object.
     */
    #[SerializedName('applicationData')]
    protected ?string $applicationData;

    public function __construct(
        string $transactionId,
        ?string $applicationData = null
    ) {
        $this->transactionId = $transactionId;
        $this->applicationData = $applicationData;
    }

    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): self
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getApplicationData(): ?string
    {
        return $this->applicationData;
    }

    public function setApplicationData(?string $applicationData): self
    {
        $this->applicationData = $applicationData;
        return $this;
    }
}
