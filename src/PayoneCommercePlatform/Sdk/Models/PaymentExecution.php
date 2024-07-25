<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * @var PaymentEvent[]|null List of payment events.
     */
    #[SerializedName('events')]
    protected ?array $events;

    public function __construct(
        ?string $paymentExecutionId = null,
        ?string $paymentId = null,
        ?CardPaymentMethodSpecificInput $cardPaymentMethodSpecificInput = null,
        ?MobilePaymentMethodSpecificInput $mobilePaymentMethodSpecificInput = null,
        ?RedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput = null,
        ?SepaDirectDebitPaymentMethodSpecificInput $sepaDirectDebitPaymentMethodSpecificInput = null,
        ?FinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput = null,
        ?PaymentChannel $paymentChannel = null,
        ?References $references = null,
        ?array $events = null
    ) {
        $this->paymentExecutionId = $paymentExecutionId;
        $this->paymentId = $paymentId;
        $this->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;
        $this->mobilePaymentMethodSpecificInput = $mobilePaymentMethodSpecificInput;
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
        $this->sepaDirectDebitPaymentMethodSpecificInput = $sepaDirectDebitPaymentMethodSpecificInput;
        $this->financingPaymentMethodSpecificInput = $financingPaymentMethodSpecificInput;
        $this->paymentChannel = $paymentChannel;
        $this->references = $references;
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
