<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object that holds the number of found Checkouts and the requested page of Checkouts.
 */
class CheckoutsResponse
{
    /**
     * @var int|null Number of found Checkouts.
     */
    #[SerializedName('numberOfCheckouts')]
    protected ?int $numberOfCheckouts;

    /**
     * @var CheckoutResponse[]|null List of Checkouts.
     */
    #[SerializedName('checkouts')]
    protected ?array $checkouts;

    public function __construct(
        ?int $numberOfCheckouts = null,
        ?array $checkouts = null
    ) {
        $this->numberOfCheckouts = $numberOfCheckouts;
        $this->checkouts = $checkouts;
    }

    // Getters and Setters
    public function getNumberOfCheckouts(): ?int
    {
        return $this->numberOfCheckouts;
    }

    public function setNumberOfCheckouts(?int $numberOfCheckouts): self
    {
        $this->numberOfCheckouts = $numberOfCheckouts;
        return $this;
    }

    public function getCheckouts(): ?array
    {
        return $this->checkouts;
    }

    public function setCheckouts(?array $checkouts): self
    {
        $this->checkouts = $checkouts;
        return $this;
    }
}
