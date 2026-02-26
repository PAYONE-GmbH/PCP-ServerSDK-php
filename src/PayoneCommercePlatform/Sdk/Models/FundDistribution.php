<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\FundDistributionType;

/**
 * @description Object containing the details of a fund distribution.
 */
class FundDistribution
{
    /**
     * @var string|null Unique identifier of the fund distribution (UUID, read-only).
     */
    #[SerializedName('id')]
    protected ?string $id;

    /**
     * @var string The account ID to which the funds are distributed.
     */
    #[SerializedName('accountId')]
    protected string $accountId;

    /**
     * @var string|null Description of the fund distribution.
     */
    #[SerializedName('description')]
    protected ?string $description;

    /**
     * @var int The amount to distribute in cents.
     */
    #[SerializedName('amount')]
    protected int $amount;

    /**
     * @var FundDistributionType The type of fund distribution.
     */
    #[SerializedName('type')]
    protected FundDistributionType $type;

    /**
     * @var string|null Merchant reference for the fund distribution.
     */
    #[SerializedName('merchantReference')]
    protected ?string $merchantReference;

    /**
     * @var string|null Merchant parameters for the fund distribution.
     */
    #[SerializedName('merchantParameters')]
    protected ?string $merchantParameters;

    public function __construct(
        string $accountId,
        int $amount,
        FundDistributionType $type,
        ?string $id = null,
        ?string $description = null,
        ?string $merchantReference = null,
        ?string $merchantParameters = null
    ) {
        $this->accountId = $accountId;
        $this->amount = $amount;
        $this->type = $type;
        $this->id = $id;
        $this->description = $description;
        $this->merchantReference = $merchantReference;
        $this->merchantParameters = $merchantParameters;
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

    public function getAccountId(): string
    {
        return $this->accountId;
    }

    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getType(): FundDistributionType
    {
        return $this->type;
    }

    public function setType(FundDistributionType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getMerchantReference(): ?string
    {
        return $this->merchantReference;
    }

    public function setMerchantReference(?string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }

    public function getMerchantParameters(): ?string
    {
        return $this->merchantParameters;
    }

    public function setMerchantParameters(?string $merchantParameters): self
    {
        $this->merchantParameters = $merchantParameters;
        return $this;
    }
}
