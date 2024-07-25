<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the related data of the created Payment Information.
 */
class PaymentInformationResponse
{
    /**
     * @var string Unique ID of the Commerce Case.
     */
    #[SerializedName('commerceCaseId')]
    protected string $commerceCaseId;

    /**
     * @var string Unique ID of the Checkout.
     */
    #[SerializedName('checkoutId')]
    protected string $checkoutId;

    /**
     * @var string Unique identifier of the customer.
     */
    #[SerializedName('merchantCustomerId')]
    protected string $merchantCustomerId;

    /**
     * @var string Unique ID of the Payment Information.
     */
    #[SerializedName('paymentInformationId')]
    protected string $paymentInformationId;

    /**
     * @var PaymentChannel|null Payment channel.
     */
    #[SerializedName('paymentChannel')]
    protected ?PaymentChannel $paymentChannel;

    /**
     * @var int Payment product identifier.
     */
    #[SerializedName('paymentProductId')]
    protected int $paymentProductId;

    /**
     * @var string Unique identifier of the POS terminal of the payment transaction.
     */
    #[SerializedName('terminalId')]
    protected string $terminalId;

    /**
     * @var string Unique ID that identifies a store location or transaction point and which refers to the contract number of the merchant accepting the card.
     */
    #[SerializedName('cardAcceptorId')]
    protected string $cardAcceptorId;

    /**
     * @var string Unique reference of the PaymentInformation. In case of card present transactions, the reference from the ECR or terminal will be used. It is always the reference for external transactions. (e.g. card present payments, cash payments or payments processed by other payment providers).
     */
    #[SerializedName('merchantReference')]
    protected string $merchantReference;

    /**
     * @var CardPaymentDetails|null Card payment details.
     */
    #[SerializedName('cardPaymentDetails')]
    protected ?CardPaymentDetails $cardPaymentDetails;

    /**
     * @var PaymentEvent[]|null List of payment events.
     */
    #[SerializedName('events')]
    protected ?array $events;

    public function __construct(
        string $commerceCaseId,
        string $checkoutId,
        string $merchantCustomerId,
        string $paymentInformationId,
        ?PaymentChannel $paymentChannel,
        int $paymentProductId,
        string $terminalId,
        string $cardAcceptorId,
        string $merchantReference,
        ?CardPaymentDetails $cardPaymentDetails = null,
        ?array $events = null
    ) {
        $this->commerceCaseId = $commerceCaseId;
        $this->checkoutId = $checkoutId;
        $this->merchantCustomerId = $merchantCustomerId;
        $this->paymentInformationId = $paymentInformationId;
        $this->paymentChannel = $paymentChannel;
        $this->paymentProductId = $paymentProductId;
        $this->terminalId = $terminalId;
        $this->cardAcceptorId = $cardAcceptorId;
        $this->merchantReference = $merchantReference;
        $this->cardPaymentDetails = $cardPaymentDetails;
        $this->events = $events;
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

    public function getPaymentInformationId(): string
    {
        return $this->paymentInformationId;
    }

    public function setPaymentInformationId(string $paymentInformationId): self
    {
        $this->paymentInformationId = $paymentInformationId;
        return $this;
    }

    public function getPaymentChannel(): ?PaymentChannel
    {
        return $this->paymentChannel;
    }

    public function setPaymentChannel(?PaymentChannel $paymentChannel): self
    {
        $this->paymentChannel = $paymentChannel;
        return $this;
    }

    public function getPaymentProductId(): int
    {
        return $this->paymentProductId;
    }

    public function setPaymentProductId(int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }

    public function getTerminalId(): string
    {
        return $this->terminalId;
    }

    public function setTerminalId(string $terminalId): self
    {
        $this->terminalId = $terminalId;
        return $this;
    }

    public function getCardAcceptorId(): string
    {
        return $this->cardAcceptorId;
    }

    public function setCardAcceptorId(string $cardAcceptorId): self
    {
        $this->cardAcceptorId = $cardAcceptorId;
        return $this;
    }

    public function getMerchantReference(): string
    {
        return $this->merchantReference;
    }

    public function setMerchantReference(string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }

    public function getCardPaymentDetails(): ?CardPaymentDetails
    {
        return $this->cardPaymentDetails;
    }

    public function setCardPaymentDetails(?CardPaymentDetails $cardPaymentDetails): self
    {
        $this->cardPaymentDetails = $cardPaymentDetails;
        return $this;
    }

    public function getEvents(): ?array
    {
        return $this->events;
    }

    public function setEvents(?array $events): self
    {
        $this->events = $events;
        return $this;
    }
}
