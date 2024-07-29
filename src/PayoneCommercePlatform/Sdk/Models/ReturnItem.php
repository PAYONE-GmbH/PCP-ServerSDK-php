<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Represents an item to be returned.
 */
class ReturnItem
{
    /**
     * @var string The ID of the item to return.
     */
    #[SerializedName('id')]
    protected string $id;

    /**
     * @var int The quantity of the units being returned, should be greater than zero.
     */
    #[SerializedName('quantity')]
    protected int $quantity;

    public function __construct(string $id, int $quantity)
    {
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
