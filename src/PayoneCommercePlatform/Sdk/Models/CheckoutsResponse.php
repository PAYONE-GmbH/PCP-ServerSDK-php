<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CheckoutResponse;

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

    /**
     * @param int|null $numberOfCheckouts Number of found Checkouts.
     * @param CheckoutResponse[]|null $checkouts List of Checkouts.
     */
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

    /**
     * @return CheckoutResponse[]|null List of Checkouts.
     */
    public function getCheckouts(): ?array
    {
        return $this->checkouts;
    }

    /**
     * @param CheckoutResponse[]|null $checkouts List of Checkouts.
     * @return self
     */
    public function setCheckouts(?array $checkouts): self
    {
        $this->checkouts = $checkouts;
        return $this;
    }
}
