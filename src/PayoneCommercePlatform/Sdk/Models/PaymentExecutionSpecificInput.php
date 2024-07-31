<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartInput;
use PayoneCommercePlatform\Sdk\Models\References;

/**
 * @description The amount of the paymentSpecificInput might differ from the Checkout amount in case of partial payments but cannot be higher. Additionally, the total amount of the provided shopping cart cannot exceed the Checkout amount. If a different currency is provided than in the Checkout, the payment execution will be declined. Provided details of the customer and shipping from the Checkout will be automatically loaded and used in the Payment Execution request. The ShoppingCart might differ from the one provided in the Checkout (e.g., for partial payments) and might be required by the payment provider (e.g., BNPL). If the ShoppingCart elements differ from the data provided in the Checkout, the existing data will not be overwritten.
 */
class PaymentExecutionSpecificInput
{
    /**
     * @var AmountOfMoney|null The amount of money involved in the payment execution.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var ShoppingCartInput|null The shopping cart data for the payment execution.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartInput $shoppingCart;

    /**
     * @var References|null Payment references linked to this transaction.
     */
    #[SerializedName('paymentReferences')]
    protected ?References $paymentReferences;

    public function __construct(
        ?References $paymentReferences = null,
        ?AmountOfMoney $amountOfMoney = null,
        ?ShoppingCartInput $shoppingCart = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->shoppingCart = $shoppingCart;
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

    public function getShoppingCart(): ?ShoppingCartInput
    {
        return $this->shoppingCart;
    }

    public function setShoppingCart(?ShoppingCartInput $shoppingCart): self
    {
        $this->shoppingCart = $shoppingCart;
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
