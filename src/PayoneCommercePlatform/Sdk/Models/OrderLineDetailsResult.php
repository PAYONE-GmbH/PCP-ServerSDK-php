<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\OrderLineDetailsInput;
use PayoneCommercePlatform\Sdk\Models\CartItemOrderStatus;

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

    /**
      * @param int $productPrice Price of the product in the smallest currency unit.
      * @param int $quantity Quantity of the product.
      * @param string|null $productCode Unique identifier of the product.
      * @param ProductType|null $productType Type of the product.
      * @param int|null $taxAmount Tax amount in the smallest currency unit.
      * @param string|null $productUrl URL of the product.
      * @param string|null $productImageUrl URL of the product image.
      * @param string|null $productCategoryPath Category path of the product.
      * @param string|null $merchantShopDeliveryReference Unique identifier of the product in the merchant shop.
      * @param string|null $id Unique identifier of a cart item.
      * @param CartItemOrderStatus[]|null $status List of cart item statuses.
      */
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

    /**
     * @return CartItemOrderStatus[]|null List of cart item statuses.
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param CartItemOrderStatus[]|null $status List of cart item statuses.
     * @return self
     */
    public function setStatus(?array $status): self
    {
        $this->status = $status;
        return $this;
    }
}
