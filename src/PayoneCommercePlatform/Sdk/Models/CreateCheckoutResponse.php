<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\CheckoutReferences;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\ErrorResponse;
use PayoneCommercePlatform\Sdk\Models\PaymentExecution;
use PayoneCommercePlatform\Sdk\Models\Shipping;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartResult;
use PayoneCommercePlatform\Sdk\Models\StatusCheckout;
use PayoneCommercePlatform\Sdk\Models\StatusOutput;
use PayoneCommercePlatform\Sdk\Models\AllowedPaymentActions;
use DateTime;

/**
 * @description Object containing the reference of the Checkout for following requests.
 */
class CreateCheckoutResponse
{
    /**
     * @var string|null Reference to the Checkout. Can be used for following requests to get and update the Checkout and execute the payment.
     */
    #[SerializedName('checkoutId')]
    protected ?string $checkoutId;

    /**
     * @var ShoppingCartResult|null Shopping cart result.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartResult $shoppingCart;

    /**
     * @var CreatePaymentResponse|null Payment response.
     */
    #[SerializedName('paymentResponse')]
    protected ?CreatePaymentResponse $paymentResponse;

    /**
     * @var ErrorResponse|null Error response.
     */
    #[SerializedName('errorResponse')]
    protected ?ErrorResponse $errorResponse;

    /**
     * @var AmountOfMoney|null Amount of money.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var CheckoutReferences|null Checkout references.
     */
    #[SerializedName('references')]
    protected ?CheckoutReferences $references;

    /**
     * @var Shipping|null Shipping details.
     */
    #[SerializedName('shipping')]
    protected ?Shipping $shipping;

    /**
     * @var PaymentExecution|null Payment execution details.
     */
    #[SerializedName('paymentExecution')]
    protected ?PaymentExecution $paymentExecution;

    /**
     * @var StatusCheckout|null Current status of the Checkout.
     */
    #[SerializedName('checkoutStatus')]
    protected ?StatusCheckout $checkoutStatus;

    /**
     * @var StatusOutput|null Status output details.
     */
    #[SerializedName('statusOutput')]
    protected ?StatusOutput $statusOutput;

    /**
     * @var DateTime|null Creation date and time of the Checkout in RFC3339 format.
     */
    #[SerializedName('creationDateTime')]
    protected ?DateTime $creationDateTime;

    /**
     * @var AllowedPaymentActions[]|null List of allowed payment actions.
     */
    #[SerializedName('allowedPaymentActions')]
    protected ?array $allowedPaymentActions;

    /**
      * @param string|null $checkoutId Reference to the Checkout. Can be used for following requests to get and update the Checkout and execute the payment.
      * @param ShoppingCartResult|null $shoppingCart Shopping cart result.
      * @param CreatePaymentResponse|null $paymentResponse Payment response.
      * @param ErrorResponse|null $errorResponse Error response.
      * @param AmountOfMoney|null $amountOfMoney Amount of money.
      * @param CheckoutReferences|null $references Checkout references.
      * @param Shipping|null $shipping Shipping details.
      * @param PaymentExecution|null $paymentExecution Payment execution details.
      * @param StatusCheckout|null $checkoutStatus Current status of the Checkout.
      * @param StatusOutput|null $statusOutput Status output details.
      * @param DateTime|null $creationDateTime Creation date and time of the Checkout in RFC3339 format.
      * @param AllowedPaymentActions[]|null $allowedPaymentActions List of allowed payment actions.
      */
    public function __construct(
        ?string $checkoutId = null,
        ?ShoppingCartResult $shoppingCart = null,
        ?CreatePaymentResponse $paymentResponse = null,
        ?ErrorResponse $errorResponse = null,
        ?AmountOfMoney $amountOfMoney = null,
        ?CheckoutReferences $references = null,
        ?Shipping $shipping = null,
        ?PaymentExecution $paymentExecution = null,
        ?StatusCheckout $checkoutStatus = null,
        ?StatusOutput $statusOutput = null,
        ?DateTime $creationDateTime = null,
        ?array $allowedPaymentActions = null
    ) {
        $this->checkoutId = $checkoutId;
        $this->shoppingCart = $shoppingCart;
        $this->paymentResponse = $paymentResponse;
        $this->errorResponse = $errorResponse;
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->shipping = $shipping;
        $this->paymentExecution = $paymentExecution;
        $this->checkoutStatus = $checkoutStatus;
        $this->statusOutput = $statusOutput;
        $this->creationDateTime = $creationDateTime;
        $this->allowedPaymentActions = $allowedPaymentActions;
    }

    // Getters and Setters
    public function getCheckoutId(): ?string
    {
        return $this->checkoutId;
    }

    public function setCheckoutId(?string $checkoutId): self
    {
        $this->checkoutId = $checkoutId;
        return $this;
    }

    public function getShoppingCart(): ?ShoppingCartResult
    {
        return $this->shoppingCart;
    }

    public function setShoppingCart(?ShoppingCartResult $shoppingCart): self
    {
        $this->shoppingCart = $shoppingCart;
        return $this;
    }

    public function getPaymentResponse(): ?CreatePaymentResponse
    {
        return $this->paymentResponse;
    }

    public function setPaymentResponse(?CreatePaymentResponse $paymentResponse): self
    {
        $this->paymentResponse = $paymentResponse;
        return $this;
    }

    public function getErrorResponse(): ?ErrorResponse
    {
        return $this->errorResponse;
    }

    public function setErrorResponse(?ErrorResponse $errorResponse): self
    {
        $this->errorResponse = $errorResponse;
        return $this;
    }

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

    public function getPaymentExecution(): ?PaymentExecution
    {
        return $this->paymentExecution;
    }

    public function setPaymentExecution(?PaymentExecution $paymentExecution): self
    {
        $this->paymentExecution = $paymentExecution;
        return $this;
    }

    public function getCheckoutStatus(): ?StatusCheckout
    {
        return $this->checkoutStatus;
    }

    public function setCheckoutStatus(?StatusCheckout $checkoutStatus): self
    {
        $this->checkoutStatus = $checkoutStatus;
        return $this;
    }

    public function getStatusOutput(): ?StatusOutput
    {
        return $this->statusOutput;
    }

    public function setStatusOutput(?StatusOutput $statusOutput): self
    {
        $this->statusOutput = $statusOutput;
        return $this;
    }

    public function getCreationDateTime(): ?DateTime
    {
        return $this->creationDateTime;
    }

    public function setCreationDateTime(?DateTime $creationDateTime): self
    {
        $this->creationDateTime = $creationDateTime;
        return $this;
    }

    /**
      * @return AllowedPaymentActions[]|null List of allowed payment actions.
      */
    public function getAllowedPaymentActions(): ?array
    {
        return $this->allowedPaymentActions;
    }

    /**
      * @param AllowedPaymentActions[]|null $allowedPaymentActions List of allowed payment actions.
      * @return self
      */
    public function setAllowedPaymentActions(?array $allowedPaymentActions): self
    {
        $this->allowedPaymentActions = $allowedPaymentActions;
        return $this;
    }
}
