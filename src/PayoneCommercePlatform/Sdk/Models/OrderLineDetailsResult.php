<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing additional information that when supplied can have a beneficial effect on the discountrates.
 */
class OrderLineDetailsResult extends OrderLineDetailsInput
{
    /**
     * @var string|null Unique identifier of a cart item.
     */
    #[SerializedName('id')]
    protected ?string $id;

    /**
     * @var CartItemOrderStatus[]|null List of cart item statuses.
     */
    #[SerializedName('status')]
    protected ?array $status;

    public function __construct(
        int $productPrice,
        int $quantity,
        ?string $productCode = null,
        ?ProductType $productType = null,
        ?int $taxAmount = null,
        ?string $productUrl = null,
        ?string $productImageUrl = null,
        ?string $productCategoryPath = null,
        ?string $merchantShopDeliveryReference = null,
        ?string $id = null,
        ?array $status = null
    ) {
        parent::__construct(
            $productPrice,
            $quantity,
            $productCode,
            $productType,
            $taxAmount,
            $productUrl,
            $productImageUrl,
            $productCategoryPath,
            $merchantShopDeliveryReference
        );
        $this->id = $id;
        $this->status = $status;
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

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function setStatus(?array $status): self
    {
        $this->status = $status;
        return $this;
    }
}
