<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\ProductType;

/**
 * @description Object containing additional information that when supplied can have a beneficial effect on the discountrates.
 */
class OrderLineDetailsInput
{
    /**
     * @var string|null Product or UPC Code
     */
    #[SerializedName('productCode')]
    protected ?string $productCode;

    /**
     * @var int The price of one unit of the product, the value should be zero or greater.
     */
    #[SerializedName('productPrice')]
    protected int $productPrice;

    /**
     * @var ProductType|null Product type classification.
     */
    #[SerializedName('productType')]
    protected ?ProductType $productType;

    /**
     * @var int Quantity of the units being purchased, should be greater than zero.
     */
    #[SerializedName('quantity')]
    protected int $quantity;

    /**
     * @var int|null Tax on the line item, with the last two digits implied as decimal places.
     */
    #[SerializedName('taxAmount')]
    protected ?int $taxAmount;

    /**
     * @var string|null URL of the product in shop. Used for PAYONE Buy Now, Pay Later (BNPL).
     */
    #[SerializedName('productUrl')]
    protected ?string $productUrl;

    /**
     * @var string|null URL of a product image. Used for PAYONE Buy Now, Pay Later (BNPL).
     */
    #[SerializedName('productImageUrl')]
    protected ?string $productImageUrl;

    /**
     * @var string|null Category path of the item. Used for PAYONE Buy Now, Pay Later (BNPL).
     */
    #[SerializedName('productCategoryPath')]
    protected ?string $productCategoryPath;

    /**
     * @var string|null Optional parameter to define the delivery shop or touchpoint where an item has been collected (e.g. for Click & Collect or Click & Reserve).
     */
    #[SerializedName('merchantShopDeliveryReference')]
    protected ?string $merchantShopDeliveryReference;

    public function __construct(
        int $productPrice,
        int $quantity,
        ?string $productCode = null,
        ?ProductType $productType = null,
        ?int $taxAmount = null,
        ?string $productUrl = null,
        ?string $productImageUrl = null,
        ?string $productCategoryPath = null,
        ?string $merchantShopDeliveryReference = null
    ) {
        $this->productCode = $productCode;
        $this->productPrice = $productPrice;
        $this->productType = $productType;
        $this->quantity = $quantity;
        $this->taxAmount = $taxAmount;
        $this->productUrl = $productUrl;
        $this->productImageUrl = $productImageUrl;
        $this->productCategoryPath = $productCategoryPath;
        $this->merchantShopDeliveryReference = $merchantShopDeliveryReference;
    }

    // Getters and Setters
    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    public function setProductCode(?string $productCode): self
    {
        $this->productCode = $productCode;
        return $this;
    }

    public function getProductPrice(): int
    {
        return $this->productPrice;
    }

    public function setProductPrice(int $productPrice): self
    {
        $this->productPrice = $productPrice;
        return $this;
    }

    public function getProductType(): ?ProductType
    {
        return $this->productType;
    }

    public function setProductType(?ProductType $productType): self
    {
        $this->productType = $productType;
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

    public function getTaxAmount(): ?int
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(?int $taxAmount): self
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    public function getProductUrl(): ?string
    {
        return $this->productUrl;
    }

    public function setProductUrl(?string $productUrl): self
    {
        $this->productUrl = $productUrl;
        return $this;
    }

    public function getProductImageUrl(): ?string
    {
        return $this->productImageUrl;
    }

    public function setProductImageUrl(?string $productImageUrl): self
    {
        $this->productImageUrl = $productImageUrl;
        return $this;
    }

    public function getProductCategoryPath(): ?string
    {
        return $this->productCategoryPath;
    }

    public function setProductCategoryPath(?string $productCategoryPath): self
    {
        $this->productCategoryPath = $productCategoryPath;
        return $this;
    }

    public function getMerchantShopDeliveryReference(): ?string
    {
        return $this->merchantShopDeliveryReference;
    }

    public function setMerchantShopDeliveryReference(?string $merchantShopDeliveryReference): self
    {
        $this->merchantShopDeliveryReference = $merchantShopDeliveryReference;
        return $this;
    }
}
