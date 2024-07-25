<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Input for the payment for a respective payment method. In case the paymentMethodSpecificInput has already been provided when creating the Commerce Case or Checkout, it will automatically be used for the Payment Execution. If a new input will be provided, the existing input will be updated.
 */
class PaymentMethodSpecificInput
{
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
     * @var CustomerDevice|null Information about the device of the end customer.
     */
    #[SerializedName('customerDevice')]
    protected ?CustomerDevice $customerDevice;

    /**
     * @var PaymentChannel|null Payment channel.
     */
    #[SerializedName('paymentChannel')]
    protected ?PaymentChannel $paymentChannel;

    public function __construct(
        ?CardPaymentMethodSpecificInput $cardPaymentMethodSpecificInput = null,
        ?MobilePaymentMethodSpecificInput $mobilePaymentMethodSpecificInput = null,
        ?RedirectPaymentMethodSpecificInput $redirectPaymentMethodSpecificInput = null,
        ?SepaDirectDebitPaymentMethodSpecificInput $sepaDirectDebitPaymentMethodSpecificInput = null,
        ?FinancingPaymentMethodSpecificInput $financingPaymentMethodSpecificInput = null,
        ?CustomerDevice $customerDevice = null,
        ?PaymentChannel $paymentChannel = null
    ) {
        $this->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;
        $this->mobilePaymentMethodSpecificInput = $mobilePaymentMethodSpecificInput;
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
        $this->sepaDirectDebitPaymentMethodSpecificInput = $sepaDirectDebitPaymentMethodSpecificInput;
        $this->financingPaymentMethodSpecificInput = $financingPaymentMethodSpecificInput;
        $this->customerDevice = $customerDevice;
        $this->paymentChannel = $paymentChannel;
    }

    // Getters and Setters
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

    public function getCustomerDevice(): ?CustomerDevice
    {
        return $this->customerDevice;
    }

    public function setCustomerDevice(?CustomerDevice $customerDevice): self
    {
        $this->customerDevice = $customerDevice;
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
}
