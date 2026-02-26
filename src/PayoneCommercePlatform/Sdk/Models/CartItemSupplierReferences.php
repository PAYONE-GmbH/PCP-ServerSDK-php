<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing supplier references for a cart item.
 */
class CartItemSupplierReferences
{
    /**
     * @var string|null The supplier identifier (max 64 characters).
     */
    #[SerializedName('supplierId')]
    protected ?string $supplierId;

    /**
     * @var string|null The order reference at the supplier (max 64 characters).
     */
    #[SerializedName('orderReference')]
    protected ?string $orderReference;

    public function __construct(
        ?string $supplierId = null,
        ?string $orderReference = null
    ) {
        $this->supplierId = $supplierId;
        $this->orderReference = $orderReference;
    }

    // Getters and Setters
    public function getSupplierId(): ?string
    {
        return $this->supplierId;
    }

    public function setSupplierId(?string $supplierId): self
    {
        $this->supplierId = $supplierId;
        return $this;
    }

    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }

    public function setOrderReference(?string $orderReference): self
    {
        $this->orderReference = $orderReference;
        return $this;
    }
}
