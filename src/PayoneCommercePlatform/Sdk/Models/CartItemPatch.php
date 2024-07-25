<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description This object contains information of all items in the cart. If a cart item is provided, the productPrice and quantity is required.
 */
class CartItemPatch
{
    /**
     * @var CartItemInvoiceData|null Invoice data of the cart item.
     */
    #[SerializedName('invoiceData')]
    protected ?CartItemInvoiceData $invoiceData;

    /**
     * @var OrderLineDetailsPatch|null Order line details of the cart item.
     */
    #[SerializedName('orderLineDetails')]
    protected ?OrderLineDetailsPatch $orderLineDetails;

    public function __construct(
        ?CartItemInvoiceData $invoiceData = null,
        ?OrderLineDetailsPatch $orderLineDetails = null
    ) {
        $this->invoiceData = $invoiceData;
        $this->orderLineDetails = $orderLineDetails;
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

    public function getOrderLineDetails(): ?OrderLineDetailsPatch
    {
        return $this->orderLineDetails;
    }

    public function setOrderLineDetails(?OrderLineDetailsPatch $orderLineDetails): self
    {
        $this->orderLineDetails = $orderLineDetails;
        return $this;
    }
}
