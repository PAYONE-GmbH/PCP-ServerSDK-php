<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CartItemInvoiceData;
use PayoneCommercePlatform\Sdk\Models\OrderLineDetailsInput;
use PayoneCommercePlatform\Sdk\Models\CartItemSupplierReferences;

/**
 * @description This object contains information of all items in the cart. If a cart item is provided, the productPrice and quantity is required.
 */
class CartItemInput
{
    /**
     * @var CartItemInvoiceData|null Invoice data of the cart item.
     */
    #[SerializedName('invoiceData')]
    protected ?CartItemInvoiceData $invoiceData;

    /**
     * @var OrderLineDetailsInput|null Order line details of the cart item.
     */
    #[SerializedName('orderLineDetails')]
    protected ?OrderLineDetailsInput $orderLineDetails;

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
        $this->invoiceData = $invoiceData;
        $this->orderLineDetails = $orderLineDetails;
        $this->supplierReferences = $supplierReferences;
    }

    // Getters and Setters
    public function getInvoiceData(): ?CartItemInvoiceData
    {
        return $this->invoiceData;
    }

    public function setInvoiceData(?CartItemInvoiceData $invoiceData): self
    {
        $this->invoiceData = $invoiceData;
        return $this;
    }

    public function getOrderLineDetails(): ?OrderLineDetailsInput
    {
        return $this->orderLineDetails;
    }

    public function setOrderLineDetails(?OrderLineDetailsInput $orderLineDetails): self
    {
        $this->orderLineDetails = $orderLineDetails;
        return $this;
    }

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
