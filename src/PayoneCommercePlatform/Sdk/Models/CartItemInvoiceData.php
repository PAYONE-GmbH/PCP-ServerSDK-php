<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the line items of the invoice or shopping cart.
 */
class CartItemInvoiceData
{
    /**
     * @var string|null Shopping cart item description. The description will also be displayed in the portal as the product name.
     */
    #[SerializedName('description')]
    protected ?string $description;

    public function __construct(
        ?string $description = null
    ) {
        $this->description = $description;
    }

    // Getters and Setters
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
