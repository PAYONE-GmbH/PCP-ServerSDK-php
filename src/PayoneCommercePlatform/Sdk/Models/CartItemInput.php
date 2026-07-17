<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CartItemSupplierReferences;

/**
 * @description This object contains information of all items in the cart. If a cart item is provided, the productPrice and quantity is required.
 */
class CartItemInput extends CartItemData
{
    /**
     * @var CartItemSupplierReferences|null Supplier references for the cart item.
     */
    #[SerializedName('supplierReferences')]
    protected ?CartItemSupplierReferences $supplierReferences;

    public function __construct(
        ?CartItemInvoiceData $invoiceData = null,
        ?OrderLineDetailsInput $orderLineDetails = null,
        ?CartItemSupplierReferences $supplierReferences = null
    ) {
        parent::__construct($invoiceData, $orderLineDetails);
        $this->supplierReferences = $supplierReferences;
    }

    // Getters and Setters
    public function getSupplierReferences(): ?CartItemSupplierReferences
    {
        return $this->supplierReferences;
    }

    public function setSupplierReferences(?CartItemSupplierReferences $supplierReferences): self
    {
        $this->supplierReferences = $supplierReferences;
        return $this;
    }
}
