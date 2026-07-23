<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CartItemData
{
    #[SerializedName('invoiceData')]
    protected ?CartItemInvoiceData $invoiceData;

    #[SerializedName('orderLineDetails')]
    protected ?OrderLineDetailsInput $orderLineDetails;

    public function __construct(?CartItemInvoiceData $invoiceData = null, ?OrderLineDetailsInput $orderLineDetails = null)
    {
        $this->invoiceData = $invoiceData;
        $this->orderLineDetails = $orderLineDetails;
    }

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
}
