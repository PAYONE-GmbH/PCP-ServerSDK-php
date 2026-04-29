<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description This object contains references of the seller of the cart item.
 */
class CartItemSupplierReferences
{
    /**
     * @var string Unique identifier for the supplier. Used for reporting to identify to which supplier the item belongs.
     * Only allowed for marketplace merchants or if feature to ignore Marketplace fields is enabled in configuration.
     */
    #[SerializedName('supplierId')]
    protected string $supplierId;

    /**
     * @var string|null The order reference at the supplier (max 64 characters).
     */
    #[SerializedName('orderReference')]
    protected ?string $orderReference;

    public function __construct(
        string $supplierId,
        ?string $orderReference = null
    ) {
        $this->supplierId = $supplierId;
        $this->orderReference = $orderReference;
    }

    // Getters and Setters
    public function getSupplierId(): string
    {
        return $this->supplierId;
    }

    public function setSupplierId(string $supplierId): self
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
