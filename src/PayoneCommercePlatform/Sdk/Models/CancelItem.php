<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CancelItem
{
    /**
     * @var string|null Id of the item to cancel.
     */
    #[SerializedName('id')]
    protected ?string $id;

    /**
     * @var int|null Quantity of the units being cancelled, should be greater than zero.
     * Note: Must not be all spaces or all zeros
     */
    #[SerializedName('quantity')]
    protected ?int $quantity;

    public function __construct(
        string $id,
        int $quantity
    ) {
        $this->id = $id;
        $this->quantity = $quantity;
    }

    // Getters and Setters
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}

