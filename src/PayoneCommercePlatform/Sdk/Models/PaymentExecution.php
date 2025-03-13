<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CardPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\MobilePaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\RedirectPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\SepaDirectDebitPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\FinancingPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\References;
use PayoneCommercePlatform\Sdk\Models\PaymentEvent;

/**
 * @description Object contains information of the payment with a specific payment method.
 */
class PaymentExecution
{
    /**
     * @var string|null Unique ID of paymentExecution.
     */
    #[SerializedName('paymentExecutionId')]
    protected ?string $paymentExecutionId;

    /**
     * @var string|null Unique payment transaction identifier of the payment gateway.
     */
    #[SerializedName('paymentId')]
    protected ?string $paymentId;

    /**
     * @var CardPaymentMethodSpecificInput|null Card payment method specific input details.
     */
    #[SerializedName('cardPaymentMethodSpecificInput')]
    protected ?CardPaymentMethodSpecificInput $cardPaymentMethodSpecificInput;

    /**
     * @var MobilePaymentMethodSpecificInput|null Mobile payment method specific input details.
     */
    #[SerializedName('mobilePaymentMethodSpecificInput')]
    protected ?MobilePaymentMethodSpecificInput $mobilePaymentMethodSpecificInput;

    /**
     * @var RedirectPaymentMethodSpecificInput|null Redirect payment method specific input details.
     */
    #[SerializedName('redirectPaymentMethodSpecificInput')]
    protected ?RedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput;

    /**
     * @var SepaDirectDebitPaymentMethodSpecificInput|null SEPA direct debit payment method specific input details.
     */
    #[SerializedName('sepaDirectDebitPaymentMethodSpecificInput')]
    protected ?SepaDirectDebitPaymentMethodSpecificInput $sepaDirectDebitPaymentMethodSpecificInput;

    /**
     * @var FinancingPaymentMethodSpecificInput|null Financing payment method specific input details.
     */
    #[SerializedName('financingPaymentMethodSpecificInput')]
    protected ?FinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput;

    /**
     * @var BankPayoutMethodSpecificInput|null Bank payout method specific input details.
     */
    #[SerializedName('bankPayoutMethodSpecificInput')]
    protected ?BankPayoutMethodSpecificInput $bankPayoutMethodSpecificInput;

    /**
     * @var PaymentChannel|null Payment channel.
     */
    #[SerializedName('paymentChannel')]
    protected ?PaymentChannel $paymentChannel;

    /**
     * @var References|null Reference details linked to this transaction.
     */
    #[SerializedName('references')]
    protected ?References $references;

    /**
     * @var string|null The previous payment ID, if applicable.
     */
    #[SerializedName('previousPayment')]
    protected ?string $previousPayment;

    /**
     * @var string|null The date and time when the payment was created.
     */
    #[SerializedName('creationDateTime')]
    protected ?string $creationDateTime;

    /**
     * @var string|null The date and time when the payment was last updated.
     */
    #[SerializedName('lastUpdated')]
    protected ?string $lastUpdated;

    /**
     * @var PaymentEvent[]|null List of payment events.
     */
    #[SerializedName('events')]
    protected ?array $events;

    /**
     * @param string|null $paymentExecutionId Unique ID of paymentExecution.
     * @param string|null $paymentId Unique payment transaction identifier of the payment gateway.
     * @param CardPaymentMethodSpecificInput|null $cardPaymentMethodSpecificInput Card payment method specific input details.
     * @param MobilePaymentMethodSpecificInput|null $mobilePaymentMethodSpecificInput Mobile payment method specific input details.
     * @param RedirectPaymentMethodSpecificInput|null $redirectPaymentMethodSpecificInput Redirect payment method specific input details.
     * @param SepaDirectDebitPaymentMethodSpecificInput|null $sepaDirectDebitPaymentMethodSpecificInput SEPA direct debit payment method specific input details.
     * @param FinancingPaymentMethodSpecificInput|null $financingPaymentMethodSpecificInput Financing payment method specific input details.
     * @param BankPayoutMethodSpecificInput|null $bankPayoutMethodSpecificInput Bank payout method specific input details.
     * @param PaymentChannel|null $paymentChannel Payment channel.
     * @param References|null $references Reference details linked to this transaction.
     * @param string|null $previousPayment The previous payment ID, if applicable.
     * @param string|null $creationDateTime The date and time when the payment was created.
     * @param string|null $lastUpdated The date and time when the payment was last updated.
     * @param PaymentEvent[]|null $events List of payment events.
     */
    public function __construct(
        ?string $paymentExecutionId = null,
        ?string $paymentId = null,
        ?CardPaymentMethodSpecificInput $cardPaymentMethodSpecificInput = null,
        ?MobilePaymentMethodSpecificInput $mobilePaymentMethodSpecificInput = null,
        ?RedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput = null,
        ?SepaDirectDebitPaymentMethodSpecificInput $sepaDirectDebitPaymentMethodSpecificInput = null,
        ?FinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput = null,
        ?BankPayoutMethodSpecificInput $bankPayoutMethodSpecificInput = null,
        ?PaymentChannel $paymentChannel = null,
        ?References $references = null,
        ?string $previousPayment = null,
        ?string $creationDateTime = null,
        ?string $lastUpdated = null,
        ?array $events = null
    ) {
        $this->paymentExecutionId = $paymentExecutionId;
        $this->paymentId = $paymentId;
        $this->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;
        $this->mobilePaymentMethodSpecificInput = $mobilePaymentMethodSpecificInput;
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
        $this->sepaDirectDebitPaymentMethodSpecificInput = $sepaDirectDebitPaymentMethodSpecificInput;
        $this->financingPaymentMethodSpecificInput = $financingPaymentMethodSpecificInput;
        $this->bankPayoutMethodSpecificInput = $bankPayoutMethodSpecificInput;
        $this->paymentChannel = $paymentChannel;
        $this->references = $references;
        $this->previousPayment = $previousPayment;
        $this->creationDateTime = $creationDateTime;
        $this->lastUpdated = $lastUpdated;
        $this->events = $events;
    }

    // Getters and Setters
    public function getPaymentExecutionId(): ?string
    {
        return $this->paymentExecutionId;
    }

    public function setPaymentExecutionId(?string $paymentExecutionId): self
    {
        $this->paymentExecutionId = $paymentExecutionId;
        return $this;
    }

    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    public function setPaymentId(?string $paymentId): self
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    public function getCardPaymentMethodSpecificInput(): ?CardPaymentMethodSpecificInput
    {
        return $this->cardPaymentMethodSpecificInput;
    }

    public function setCardPaymentMethodSpecificInput(?CardPaymentMethodSpecificInput $cardPaymentMethodSpecificInput): self
    {
        $this->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;
        return $this;
    }

    public function getMobilePaymentMethodSpecificInput(): ?MobilePaymentMethodSpecificInput
    {
        return $this->mobilePaymentMethodSpecificInput;
    }

    public function setMobilePaymentMethodSpecificInput(?MobilePaymentMethodSpecificInput $mobilePaymentMethodSpecificInput): self
    {
        $this->mobilePaymentMethodSpecificInput = $mobilePaymentMethodSpecificInput;
        return $this;
    }

    public function getRedirectPaymentMethodSpecificInput(): ?RedirectPaymentMethodSpecificInput
    {
        return $this->redirectPaymentMethodSpecificInput;
    }

    public function setRedirectPaymentMethodSpecificInput(?RedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput): self
    {
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
        return $this;
    }

    public function getSepaDirectDebitPaymentMethodSpecificInput(): ?SepaDirectDebitPaymentMethodSpecificInput
    {
        return $this->sepaDirectDebitPaymentMethodSpecificInput;
    }

    public function setSepaDirectDebitPaymentMethodSpecificInput(?SepaDirectDebitPaymentMethodSpecificInput $sepaDirectDebitPaymentMethodSpecificInput): self
    {
        $this->sepaDirectDebitPaymentMethodSpecificInput = $sepaDirectDebitPaymentMethodSpecificInput;
        return $this;
    }

    public function getFinancingPaymentMethodSpecificInput(): ?FinancingPaymentMethodSpecificInput
    {
        return $this->financingPaymentMethodSpecificInput;
    }

    public function setFinancingPaymentMethodSpecificInput(?FinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput): self
    {
        $this->financingPaymentMethodSpecificInput = $financingPaymentMethodSpecificInput;
        return $this;
    }

    public function getBankPayoutMethodSpecificInput(): ?BankPayoutMethodSpecificInput
    {
        return $this->bankPayoutMethodSpecificInput;
    }

    public function setBankPayoutMethodSpecificInput(?BankPayoutMethodSpecificInput $bankPayoutMethodSpecificInput): self
    {
        $this->bankPayoutMethodSpecificInput = $bankPayoutMethodSpecificInput;
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

    public function getReferences(): ?References
    {
        return $this->references;
    }

    public function setReferences(?References $references): self
    {
        $this->references = $references;
        return $this;
    }

    public function getPreviousPayment(): ?string
    {
        return $this->previousPayment;
    }

    public function setPreviousPayment(?string $previousPayment): self
    {
        $this->previousPayment = $previousPayment;
        return $this;
    }

    public function getCreationDateTime(): ?string
    {
        return $this->creationDateTime;
    }

    public function setCreationDateTime(?string $creationDateTime): self
    {
        $this->creationDateTime = $creationDateTime;
        return $this;
    }

    public function getLastUpdated(): ?string
    {
        return $this->lastUpdated;
    }

    public function setLastUpdated(?string $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return PaymentEvent[]|null List of payment events.
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * @param PaymentEvent[]|null $events List of payment events.
     * @return self
     */
    public function setEvents(?array $events): self
    {
        $this->events = $events;
        return $this;
    }
}
