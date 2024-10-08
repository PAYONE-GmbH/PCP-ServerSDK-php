<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\OrderType;
use PayoneCommercePlatform\Sdk\Models\References;
use PayoneCommercePlatform\Sdk\Models\OrderItem;
use PayoneCommercePlatform\Sdk\Models\PaymentMethodSpecificInput;

/**
 * @description Request to execute an Order for the corresponding Checkout for a specific payment method. The provided data from the Commerce Case and the Checkout regarding customer, shipping, and ShoppingCart will be automatically loaded and used for the Payment Execution. In case the paymentMethodSpecificInput has already been provided when creating the Commerce Case or Checkout, this input will automatically be used. An Order can be created for a full or the partial ShoppingCart of the Checkout. For a partial Order a list of items must be provided. The platform will automatically calculate the respective amount to trigger the payment execution.
 */
class OrderRequest
{
    /**
     * @var OrderType|null The orderType refers to the ShoppingCart of the Checkout.
     */
    #[SerializedName('orderType')]
    protected ?OrderType $orderType;

    /**
     * @var References|null References for the order.
     */
    #[SerializedName('orderReferences')]
    protected ?References $orderReferences;

    /**
     * @var OrderItem[]|null List of items for the order, required for orderType = PARTIAL.
     */
    #[SerializedName('items')]
    protected ?array $items;

    /**
     * @var PaymentMethodSpecificInput|null Specific input details for the payment method.
     */
    #[SerializedName('paymentMethodSpecificInput')]
    protected ?PaymentMethodSpecificInput $paymentMethodSpecificInput;

    /**
     * @param OrderType|null $orderType The orderType refers to the ShoppingCart of the Checkout.
     * @param References $orderReferences|null References for the order.
     * @param OrderItem[]|null $items List of items for the order, required for orderType = PARTIAL.
     * @param PaymentMethodSpecificInput|null $paymentMethodSpecificInput Specific input details for the payment method.
     */
    public function __construct(
        ?References $orderReferences = null,
        ?OrderType $orderType = null,
        ?array $items = null,
        ?PaymentMethodSpecificInput $paymentMethodSpecificInput = null
    ) {
        $this->orderType = $orderType;
        $this->orderReferences = $orderReferences;
        $this->items = $items;
        $this->paymentMethodSpecificInput = $paymentMethodSpecificInput;
    }

    // Getters and Setters
    public function getOrderType(): ?OrderType
    {
        return $this->orderType;
    }

    public function setOrderType(?OrderType $orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }

    public function getOrderReferences(): ?References
    {
        return $this->orderReferences;
    }

    public function setOrderReferences(?References $orderReferences): self
    {
        $this->orderReferences = $orderReferences;
        return $this;
    }

    /**
     * @return OrderItem[]|null List of items for the order, required for orderType = PARTIAL.
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param OrderItem[]|null $items List of items for the order, required for orderType = PARTIAL.
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function getPaymentMethodSpecificInput(): ?PaymentMethodSpecificInput
    {
        return $this->paymentMethodSpecificInput;
    }

    public function setPaymentMethodSpecificInput(?PaymentMethodSpecificInput $paymentMethodSpecificInput): self
    {
        $this->paymentMethodSpecificInput = $paymentMethodSpecificInput;
        return $this;
    }
}
