<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the specific input details for card payments.
 */
class CardPaymentMethodSpecificInput
{
    /**
     * @var AuthorizationMode|null Authorization mode.
     */
    #[SerializedName('authorizationMode')]
    protected ?AuthorizationMode $authorizationMode;

    /**
     * @var CardRecurrenceDetails|null Recurrence details for card payments.
     */
    #[SerializedName('recurring')]
    protected ?CardRecurrenceDetails $recurring;

    /**
     * @var string|null ID of the token to use to create the payment.
     */
    #[SerializedName('paymentProcessingToken')]
    protected ?string $paymentProcessingToken;

    /**
     * @var string|null Token to identify the card in the reporting.
     */
    #[SerializedName('reportingToken')]
    protected ?string $reportingToken;

    /**
     * @var TransactionChannel|null Transaction channel.
     */
    #[SerializedName('transactionChannel')]
    protected ?TransactionChannel $transactionChannel;

    /**
     * @var UnscheduledCardOnFileRequestor|null Requestor for unscheduled card on file transactions.
     */
    #[SerializedName('unscheduledCardOnFileRequestor')]
    protected ?UnscheduledCardOnFileRequestor $unscheduledCardOnFileRequestor;

    /**
     * @var UnscheduledCardOnFileSequenceIndicator|null Sequence indicator for unscheduled card on file transactions.
     */
    #[SerializedName('unscheduledCardOnFileSequenceIndicator')]
    protected ?UnscheduledCardOnFileSequenceIndicator $unscheduledCardOnFileSequenceIndicator;

    /**
     * @var int|null Payment product identifier.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var CardInfo|null Additional non PCI DSS relevant card information.
     */
    #[SerializedName('card')]
    protected ?CardInfo $card;

    /**
     * @var string|null The URL that the customer is redirected to after the payment flow has finished.
     */
    #[SerializedName('returnUrl')]
    protected ?string $returnUrl;

    /**
     * @var string|null Period of payment occurrence for recurring and installment payments.
     */
    #[SerializedName('cardOnFileRecurringFrequency')]
    protected ?string $cardOnFileRecurringFrequency;

    /**
     * @var string|null The end date of the last scheduled payment in a series of transactions. Format YYYYMMDD.
     */
    #[SerializedName('cardOnFileRecurringExpiration')]
    protected ?string $cardOnFileRecurringExpiration;

    public function __construct(
        ?AuthorizationMode $authorizationMode = null,
        ?CardRecurrenceDetails $recurring = null,
        ?string $paymentProcessingToken = null,
        ?string $reportingToken = null,
        ?TransactionChannel $transactionChannel = null,
        ?UnscheduledCardOnFileRequestor $unscheduledCardOnFileRequestor = null,
        ?UnscheduledCardOnFileSequenceIndicator $unscheduledCardOnFileSequenceIndicator = null,
        ?int $paymentProductId = null,
        ?CardInfo $card = null,
        ?string $returnUrl = null,
        ?string $cardOnFileRecurringFrequency = null,
        ?string $cardOnFileRecurringExpiration = null
    ) {
        $this->authorizationMode = $authorizationMode;
        $this->recurring = $recurring;
        $this->paymentProcessingToken = $paymentProcessingToken;
        $this->reportingToken = $reportingToken;
        $this->transactionChannel = $transactionChannel;
        $this->unscheduledCardOnFileRequestor = $unscheduledCardOnFileRequestor;
        $this->unscheduledCardOnFileSequenceIndicator = $unscheduledCardOnFileSequenceIndicator;
        $this->paymentProductId = $paymentProductId;
        $this->card = $card;
        $this->returnUrl = $returnUrl;
        $this->cardOnFileRecurringFrequency = $cardOnFileRecurringFrequency;
        $this->cardOnFileRecurringExpiration = $cardOnFileRecurringExpiration;
    }

    // Getters and Setters
    public function getAuthorizationMode(): ?AuthorizationMode
    {
        return $this->authorizationMode;
    }

    public function setAuthorizationMode(?AuthorizationMode $authorizationMode): self
    {
        $this->authorizationMode = $authorizationMode;
        return $this;
    }

    public function getRecurring(): ?CardRecurrenceDetails
    {
        return $this->recurring;
    }

    public function setRecurring(?CardRecurrenceDetails $recurring): self
    {
        $this->recurring = $recurring;
        return $this;
    }

    public function getPaymentProcessingToken(): ?string
    {
        return $this->paymentProcessingToken;
    }

    public function setPaymentProcessingToken(?string $paymentProcessingToken): self
    {
        $this->paymentProcessingToken = $paymentProcessingToken;
        return $this;
    }

    public function getReportingToken(): ?string
    {
        return $this->reportingToken;
    }

    public function setReportingToken(?string $reportingToken): self
    {
        $this->reportingToken = $reportingToken;
        return $this;
    }

    public function getTransactionChannel(): ?TransactionChannel
    {
        return $this->transactionChannel;
    }

    public function setTransactionChannel(?TransactionChannel $transactionChannel): self
    {
        $this->transactionChannel = $transactionChannel;
        return $this;
    }

    public function getUnscheduledCardOnFileRequestor(): ?UnscheduledCardOnFileRequestor
    {
        return $this->unscheduledCardOnFileRequestor;
    }

    public function setUnscheduledCardOnFileRequestor(?UnscheduledCardOnFileRequestor $unscheduledCardOnFileRequestor): self
    {
        $this->unscheduledCardOnFileRequestor = $unscheduledCardOnFileRequestor;
        return $this;
    }

    public function getUnscheduledCardOnFileSequenceIndicator(): ?UnscheduledCardOnFileSequenceIndicator
    {
        return $this->unscheduledCardOnFileSequenceIndicator;
    }

    public function setUnscheduledCardOnFileSequenceIndicator(?UnscheduledCardOnFileSequenceIndicator $unscheduledCardOnFileSequenceIndicator): self
    {
        $this->unscheduledCardOnFileSequenceIndicator = $unscheduledCardOnFileSequenceIndicator;
        return $this;
    }

    public function getPaymentProductId(): ?int
    {
        return $this->paymentProductId;
    }

    public function setPaymentProductId(?int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }

    public function getCard(): ?CardInfo
    {
        return $this->card;
    }

    public function setCard(?CardInfo $card): self
    {
        $this->card = $card;
        return $this;
    }

    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    public function setReturnUrl(?string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    public function getCardOnFileRecurringFrequency(): ?string
    {
        return $this->cardOnFileRecurringFrequency;
    }

    public function setCardOnFileRecurringFrequency(?string $cardOnFileRecurringFrequency): self
    {
        $this->cardOnFileRecurringFrequency = $cardOnFileRecurringFrequency;
        return $this;
    }

    public function getCardOnFileRecurringExpiration(): ?string
    {
        return $this->cardOnFileRecurringExpiration;
    }

    public function setCardOnFileRecurringExpiration(?string $cardOnFileRecurringExpiration): self
    {
        $this->cardOnFileRecurringExpiration = $cardOnFileRecurringExpiration;
        return $this;
    }
}
