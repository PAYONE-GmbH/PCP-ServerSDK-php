<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object that holds the payment related properties for the refund of a Payment Information.
 */
class PayoutResponse
{
    /**
     * @var PayoutOutput|null The payout output details.
     */
    #[SerializedName('payoutOutput')]
    protected ?PayoutOutput $payoutOutput;

    /**
     * @var StatusValue|null The status of the payout.
     */
    #[SerializedName('status')]
    protected ?StatusValue $status;

    /**
     * @var StatusCategoryValue|null The status category of the payout.
     */
    #[SerializedName('statusCategory')]
    protected ?StatusCategoryValue $statusCategory;

    /**
     * @var string|null Unique payment transaction identifier of the payment gateway.
     */
    #[SerializedName('id')]
    protected ?string $id;

    public function __construct(
        ?PayoutOutput $payoutOutput = null,
        ?StatusValue $status = null,
        ?StatusCategoryValue $statusCategory = null,
        ?string $id = null
    ) {
        $this->payoutOutput = $payoutOutput;
        $this->status = $status;
        $this->statusCategory = $statusCategory;
        $this->id = $id;
    }

    // Getters and Setters
    public function getPayoutOutput(): ?PayoutOutput
    {
        return $this->payoutOutput;
    }

    public function setPayoutOutput(?PayoutOutput $payoutOutput): self
    {
        $this->payoutOutput = $payoutOutput;
        return $this;
    }

    public function getStatus(): ?StatusValue
    {
        return $this->status;
    }

    public function setStatus(?StatusValue $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatusCategory(): ?StatusCategoryValue
    {
        return $this->statusCategory;
    }

    public function setStatusCategory(?StatusCategoryValue $statusCategory): self
    {
        $this->statusCategory = $statusCategory;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }
}
