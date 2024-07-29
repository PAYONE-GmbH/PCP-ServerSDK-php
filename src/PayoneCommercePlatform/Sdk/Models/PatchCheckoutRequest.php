<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\CheckoutReferences;
use PayoneCommercePlatform\Sdk\Models\Shipping;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartPatch;
use PayoneCommercePlatform\Sdk\Models\PaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\References;

/**
 * @description An existing shopping cart of a Checkout will not be overwritten with the Patch request. New items can be added to the shoppingCart by providing them in the request. To change existing items (delete, modify or add), the respective itemId must be provided. An item can be completely removed if quantity = 0 is provided.
 *
 * The price of an item can be changed as long as no payment has happened for this item (i.e. as long as an item has no specific status). Items with a status can no longer be removed entirely, however the quantity can be increased or decreased (for items without payment) by using the itemId.
 *
 * If no amountOfMoney for the Checkout is provided, the platform will calculate the respective amount based on the cartItem productPrice and productQuantity.
 */
class PatchCheckoutRequest
{
    /**
     * @var AmountOfMoney|null The amount of money for the checkout.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var CheckoutReferences|null The checkout references.
     */
    #[SerializedName('references')]
    protected ?CheckoutReferences $references;

    /**
     * @var Shipping|null The shipping details.
     */
    #[SerializedName('shipping')]
    protected ?Shipping $shipping;

    /**
     * @var ShoppingCartPatch|null The shopping cart details.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartPatch $shoppingCart;

    /**
     * @var PaymentMethodSpecificInput|null The specific input details for the payment method.
     */
    #[SerializedName('paymentMethodSpecificInput')]
    protected ?PaymentMethodSpecificInput $paymentMethodSpecificInput;

    /**
     * @var References|null The payment references.
     */
    #[SerializedName('paymentReferences')]
    protected ?References $paymentReferences;

    public function __construct(
        ?AmountOfMoney $amountOfMoney = null,
        ?CheckoutReferences $references = null,
        ?Shipping $shipping = null,
        ?ShoppingCartPatch $shoppingCart = null,
        ?PaymentMethodSpecificInput $paymentMethodSpecificInput = null,
        ?References $paymentReferences = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->shipping = $shipping;
        $this->shoppingCart = $shoppingCart;
        $this->paymentMethodSpecificInput = $paymentMethodSpecificInput;
        $this->paymentReferences = $paymentReferences;
    }

    // Getters and Setters
    public function getAmountOfMoney(): ?AmountOfMoney
    {
        return $this->amountOfMoney;
    }

    public function setAmountOfMoney(?AmountOfMoney $amountOfMoney): self
    {
        $this->amountOfMoney = $amountOfMoney;
        return $this;
    }

    public function getReferences(): ?CheckoutReferences
    {
        return $this->references;
    }

    public function setReferences(?CheckoutReferences $references): self
    {
        $this->references = $references;
        return $this;
    }

    public function getShipping(): ?Shipping
    {
        return $this->shipping;
    }

    public function setShipping(?Shipping $shipping): self
    {
        $this->shipping = $shipping;
        return $this;
    }

    public function getShoppingCart(): ?ShoppingCartPatch
    {
        return $this->shoppingCart;
    }

    public function setShoppingCart(?ShoppingCartPatch $shoppingCart): self
    {
        $this->shoppingCart = $shoppingCart;
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

    public function getPaymentReferences(): ?References
    {
        return $this->paymentReferences;
    }

    public function setPaymentReferences(?References $paymentReferences): self
    {
        $this->paymentReferences = $paymentReferences;
        return $this;
    }
}
