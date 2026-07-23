<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Instructions for distributing funds to multiple suppliers or partners in a marketplace context.
 * Only allowed for marketplace merchants or if feature to ignore Marketplace fields is enabled in configuration.
 */
class FundSplit
{
    /**
     * @var string|null Unique identifier of the fund split (UUID, read-only).
     */
    #[SerializedName('id')]
    protected ?string $id;

    /**
     * @var string|null Unique identifier of the payment event (UUID, read-only).
     */
    #[SerializedName('paymentEventId')]
    protected ?string $paymentEventId;

    /**
     * @var FundDistribution[]|null List of fund distributions.
     */
    #[SerializedName('fundDistributions')]
    protected ?array $fundDistributions;

    /**
     * @param string|null $id Unique identifier of the fund split (UUID, read-only).
     * @param string|null $paymentEventId Unique identifier of the payment event (UUID, read-only).
     * @param FundDistribution[]|null $fundDistributions List of fund distributions.
     */
    public function __construct(
        ?string $id = null,
        ?string $paymentEventId = null,
        ?array $fundDistributions = null
    ) {
        $this->id = $id;
        $this->paymentEventId = $paymentEventId;
        $this->fundDistributions = $fundDistributions;
    }

    // Getters and Setters
    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getPaymentEventId(): ?string
    {
        return $this->paymentEventId;
    }

    public function setPaymentEventId(?string $paymentEventId): self
    {
        $this->paymentEventId = $paymentEventId;
        return $this;
    }

    /**
     * @return FundDistribution[]|null List of fund distributions.
     */
    public function getFundDistributions(): ?array
    {
        return $this->fundDistributions;
    }

    /**
     * @param FundDistribution[]|null $fundDistributions List of fund distributions.
     * @return self
     */
    public function setFundDistributions(?array $fundDistributions): self
    {
        $this->fundDistributions = $fundDistributions;
        return $this;
    }
}
