<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing payment details.
 */
class PaymentOutput
{
    /**
     * @var AmountOfMoney|null Amount of money details.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var string|null It allows you to store additional parameters for the transaction in JSON format. This field should not contain any personal data.
     */
    #[SerializedName('merchantParameters')]
    protected ?string $merchantParameters;

    /**
     * @var PaymentReferences|null Payment reference details.
     */
    #[SerializedName('references')]
    protected ?PaymentReferences $references;

    /**
     * @var CardPaymentMethodSpecificOutput|null Card payment method specific details.
     */
    #[SerializedName('cardPaymentMethodSpecificOutput')]
    protected ?CardPaymentMethodSpecificOutput $cardPaymentMethodSpecificOutput;

    /**
     * @var MobilePaymentMethodSpecificOutput|null Mobile payment method specific details.
     */
    #[SerializedName('mobilePaymentMethodSpecificOutput')]
    protected ?MobilePaymentMethodSpecificOutput $mobilePaymentMethodSpecificOutput;

    /**
     * @var string|null Payment method identifier based on the paymentProductId.
     */
    #[SerializedName('paymentMethod')]
    protected ?string $paymentMethod;

    /**
     * @var RedirectPaymentMethodSpecificOutput|null Redirect payment method specific details.
     */
    #[SerializedName('redirectPaymentMethodSpecificOutput')]
    protected ?RedirectPaymentMethodSpecificOutput $redirectPaymentMethodSpecificOutput;

    /**
     * @var SepaDirectDebitPaymentMethodSpecificOutput|null SEPA direct debit payment method specific details.
     */
    #[SerializedName('sepaDirectDebitPaymentMethodSpecificOutput')]
    protected ?SepaDirectDebitPaymentMethodSpecificOutput $sepaDirectDebitPaymentMethodSpecificOutput;

    /**
     * @var FinancingPaymentMethodSpecificOutput|null Financing payment method specific details.
     */
    #[SerializedName('financingPaymentMethodSpecificOutput')]
    protected ?FinancingPaymentMethodSpecificOutput $financingPaymentMethodSpecificOutput;

    public function __construct(
        ?AmountOfMoney $amountOfMoney = null,
        ?string $merchantParameters = null,
        ?PaymentReferences $references = null,
        ?CardPaymentMethodSpecificOutput $cardPaymentMethodSpecificOutput = null,
        ?MobilePaymentMethodSpecificOutput $mobilePaymentMethodSpecificOutput = null,
        ?string $paymentMethod = null,
        ?RedirectPaymentMethodSpecificOutput $redirectPaymentMethodSpecificOutput = null,
        ?SepaDirectDebitPaymentMethodSpecificOutput $sepaDirectDebitPaymentMethodSpecificOutput = null,
        ?FinancingPaymentMethodSpecificOutput $financingPaymentMethodSpecificOutput = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->merchantParameters = $merchantParameters;
        $this->references = $references;
        $this->cardPaymentMethodSpecificOutput = $cardPaymentMethodSpecificOutput;
        $this->mobilePaymentMethodSpecificOutput = $mobilePaymentMethodSpecificOutput;
        $this->paymentMethod = $paymentMethod;
        $this->redirectPaymentMethodSpecificOutput = $redirectPaymentMethodSpecificOutput;
        $this->sepaDirectDebitPaymentMethodSpecificOutput = $sepaDirectDebitPaymentMethodSpecificOutput;
        $this->financingPaymentMethodSpecificOutput = $financingPaymentMethodSpecificOutput;
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

    public function getMerchantParameters(): ?string
    {
        return $this->merchantParameters;
    }

    public function setMerchantParameters(?string $merchantParameters): self
    {
        $this->merchantParameters = $merchantParameters;
        return $this;
    }

    public function getReferences(): ?PaymentReferences
    {
        return $this->references;
    }

    public function setReferences(?PaymentReferences $references): self
    {
        $this->references = $references;
        return $this;
    }

    public function getCardPaymentMethodSpecificOutput(): ?CardPaymentMethodSpecificOutput
    {
        return $this->cardPaymentMethodSpecificOutput;
    }

    public function setCardPaymentMethodSpecificOutput(?CardPaymentMethodSpecificOutput $cardPaymentMethodSpecificOutput): self
    {
        $this->cardPaymentMethodSpecificOutput = $cardPaymentMethodSpecificOutput;
        return $this;
    }

    public function getMobilePaymentMethodSpecificOutput(): ?MobilePaymentMethodSpecificOutput
    {
        return $this->mobilePaymentMethodSpecificOutput;
    }

    public function setMobilePaymentMethodSpecificOutput(?MobilePaymentMethodSpecificOutput $mobilePaymentMethodSpecificOutput): self
    {
        $this->mobilePaymentMethodSpecificOutput = $mobilePaymentMethodSpecificOutput;
        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getRedirectPaymentMethodSpecificOutput(): ?RedirectPaymentMethodSpecificOutput
    {
        return $this->redirectPaymentMethodSpecificOutput;
    }

    public function setRedirectPaymentMethodSpecificOutput(?RedirectPaymentMethodSpecificOutput $redirectPaymentMethodSpecificOutput): self
    {
        $this->redirectPaymentMethodSpecificOutput = $redirectPaymentMethodSpecificOutput;
        return $this;
    }

    public function getSepaDirectDebitPaymentMethodSpecificOutput(): ?SepaDirectDebitPaymentMethodSpecificOutput
    {
        return $this->sepaDirectDebitPaymentMethodSpecificOutput;
    }

    public function setSepaDirectDebitPaymentMethodSpecificOutput(?SepaDirectDebitPaymentMethodSpecificOutput $sepaDirectDebitPaymentMethodSpecificOutput): self
    {
        $this->sepaDirectDebitPaymentMethodSpecificOutput = $sepaDirectDebitPaymentMethodSpecificOutput;
        return $this;
    }

    public function getFinancingPaymentMethodSpecificOutput(): ?FinancingPaymentMethodSpecificOutput
    {
        return $this->financingPaymentMethodSpecificOutput;
    }

    public function setFinancingPaymentMethodSpecificOutput(?FinancingPaymentMethodSpecificOutput $financingPaymentMethodSpecificOutput): self
    {
        $this->financingPaymentMethodSpecificOutput = $financingPaymentMethodSpecificOutput;
        return $this;
    }
}
