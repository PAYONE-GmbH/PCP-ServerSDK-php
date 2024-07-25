<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use DateTime;

/**
 * @description The Checkout corresponds to the order of the WL API. We do not take additionalInput from the WL API. We have no shipping and use deliveryAddress instead of address.
 */
class CheckoutResponse
{
    /**
     * @var string Reference to the Commerce Case.
     */
    #[SerializedName('commerceCaseId')]
    protected string $commerceCaseId;

    /**
     * @var string Reference to the Checkout.
     */
    #[SerializedName('checkoutId')]
    protected string $checkoutId;

    /**
     * @var string Unique identifier for the customer.
     */
    #[SerializedName('merchantCustomerId')]
    protected string $merchantCustomerId;

    /**
     * @var AmountOfMoney|null The amount of money for the checkout.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var CheckoutReferences|null References for the checkout.
     */
    #[SerializedName('references')]
    protected ?CheckoutReferences $references;

    /**
     * @var Shipping|null Shipping information for the checkout.
     */
    #[SerializedName('shipping')]
    protected ?Shipping $shipping;

    /**
     * @var ShoppingCartResult|null Shopping cart data for the checkout.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartResult $shoppingCart;

    /**
     * @var PaymentExecution[]|null List of payment executions.
     */
    #[SerializedName('paymentExecutions')]
    protected ?array $paymentExecutions;

    /**
     * @var StatusCheckout|null The current status of the checkout.
     */
    #[SerializedName('checkoutStatus')]
    protected ?StatusCheckout $checkoutStatus;

    /**
     * @var StatusOutput|null The status output details.
     */
    #[SerializedName('statusOutput')]
    protected ?StatusOutput $statusOutput;

    /**
     * @var PaymentInformationResponse[]|null List of payment information responses.
     */
    #[SerializedName('paymentInformation')]
    protected ?array $paymentInformation;

    /**
     * @var DateTime|null The creation date and time of the checkout in RFC3339 format.
     */
    #[SerializedName('creationDateTime')]
    protected ?DateTime $creationDateTime;

    /**
     * @var AllowedPaymentActions[]|null List of allowed payment actions.
     */
    #[SerializedName('allowedPaymentActions')]
    protected ?array $allowedPaymentActions;

    public function __construct(
        string $commerceCaseId,
        string $checkoutId,
        string $merchantCustomerId,
        ?AmountOfMoney $amountOfMoney = null,
        ?CheckoutReferences $references = null,
        ?Shipping $shipping = null,
        ?ShoppingCartResult $shoppingCart = null,
        ?array $paymentExecutions = null,
        ?StatusCheckout $checkoutStatus = null,
        ?StatusOutput $statusOutput = null,
        ?array $paymentInformation = null,
        ?DateTime $creationDateTime = null,
        ?array $allowedPaymentActions = null
    ) {
        $this->commerceCaseId = $commerceCaseId;
        $this->checkoutId = $checkoutId;
        $this->merchantCustomerId = $merchantCustomerId;
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->shipping = $shipping;
        $this->shoppingCart = $shoppingCart;
        $this->paymentExecutions = $paymentExecutions;
        $this->checkoutStatus = $checkoutStatus;
        $this->statusOutput = $statusOutput;
        $this->paymentInformation = $paymentInformation;
        $this->creationDateTime = $creationDateTime;
        $this->allowedPaymentActions = $allowedPaymentActions;
    }

    // Getters and Setters
    public function getCommerceCaseId(): string
    {
        return $this->commerceCaseId;
    }

    public function setCommerceCaseId(string $commerceCaseId): self
    {
        $this->commerceCaseId = $commerceCaseId;
        return $this;
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

    public function setCheckoutId(string $checkoutId): self
    {
        $this->checkoutId = $checkoutId;
        return $this;
    }

    public function getMerchantCustomerId(): string
    {
        return $this->merchantCustomerId;
    }

    public function setMerchantCustomerId(string $merchantCustomerId): self
    {
        $this->merchantCustomerId = $merchantCustomerId;
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

    public function getShoppingCart(): ?ShoppingCartResult
    {
        return $this->shoppingCart;
    }

    public function setShoppingCart(?ShoppingCartResult $shoppingCart): self
    {
        $this->shoppingCart = $shoppingCart;
        return $this;
    }

    public function getPaymentExecutions(): ?array
    {
        return $this->paymentExecutions;
    }

    public function setPaymentExecutions(?array $paymentExecutions): self
    {
        $this->paymentExecutions = $paymentExecutions;
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

    public function getPaymentInformation(): ?array
    {
        return $this->paymentInformation;
    }

    public function setPaymentInformation(?array $paymentInformation): self
    {
        $this->paymentInformation = $paymentInformation;
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

    public function getAllowedPaymentActions(): ?array
    {
        return $this->allowedPaymentActions;
    }

    public function setAllowedPaymentActions(?array $allowedPaymentActions): self
    {
        $this->allowedPaymentActions = $allowedPaymentActions;
        return $this;
    }
}
