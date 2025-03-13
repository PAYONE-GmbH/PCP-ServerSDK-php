<?php

namespace PayoneCommercePlatform\Sdk\Models;

use PayoneCommercePlatform\Sdk\Models\SepaTransferPaymentProduct772SpecificInput;
use Symfony\Component\Serializer\Annotation\SerializedName;

class BankPayoutMethodSpecificInput
{
    /**
     * @var int
     */
    #[SerializedName('paymentProductId')]
    private $paymentProductId;

    /**
     * @var SepaTransferPaymentProduct772SpecificInput|null
     */
    #[SerializedName('paymentProduct772SpecificInput')]
    private $paymentProduct772SpecificInput;

    public function __construct(
        int $paymentProductId,
        ?SepaTransferPaymentProduct772SpecificInput $paymentProduct772SpecificInput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct772SpecificInput = $paymentProduct772SpecificInput;
    }


    // Getters and Setters
    public function getPaymentProductId(): int
    {
        return $this->paymentProductId;
    }

    public function setPaymentProductId(int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }


    public function getPaymentProduct772SpecificInput(): ?SepaTransferPaymentProduct772SpecificInput
    {
        return $this->paymentProduct772SpecificInput;
    }

    public function setPaymentProduct772SpecificInput(?SepaTransferPaymentProduct772SpecificInput $paymentProduct772SpecificInput): self
    {
        $this->paymentProduct772SpecificInput = $paymentProduct772SpecificInput;
        return $this;
    }
}
